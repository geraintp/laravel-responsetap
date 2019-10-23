<?php

namespace Geraintp\LaravelResponseTap\Resources;

use GuzzleHttp\Exception\GuzzleException;
use Geraintp\LaravelResponseTap\Exceptions\MethodNotFound;

abstract class AbstractResource
{
	/**
	 * @var \GuzzleHttp\Client
	 */
	protected $client;

	/**
	 * @var string
	 */
	protected $endpoint = null;

	/**
	 * @var ResponseInterface
	 */
	protected $lastResponse = null;

	/**
	 * Making a resource.
	 *
	 * @param \GuzzleHttp\Client $client
	 */
	public function __construct($client)
	{
		$this->client = $client;
	}

	/**
	 * Get the list of all resources.
	 */
	public function all()
	{
		return $this->request('GET', "{$this->endpoint}");
	}

	/**
	 * Create a new Single Number.
	 *
	 * @param array $data
	 */
	public function create(array $data)
	{
		return $this->request('POST', "{$this->endpoint}", [
			'json' => $data,
		]);
	}

	/**
	 * Get the specific Resource via ID.
	 *
	 * @param int $id
	 */
	public function get(int $id)
	{
		return $this->request('GET', "{$this->endpoint}/{$id}");
	}

	/**
	 * Update a Resource via ID.
	 *
	 * @param int   $id
	 * @param array $data
	 */
	public function update(int $id, array $data)
	{
		return $this->request('PUT', "{$this->endpoint}/{$id}", [
			'json' => $data,
		]);
	}

	/**
	 * Delete a Resource via ID.
	 *
	 * @param int   $id
	 * @param array $data
	 */
	public function delete(int $id)
	{
		return $this->request('DELETE', "{$this->endpoint}/{$id}");
	}

	/**
	 * Preform a Remote Request to an endpoint.
	 *
	 * @param string $endpoint
	 *
	 * @return ResponseInterface
	 */
	private function request(string $method, string $endpoint, $options = [])
	{
		try {
			$this->lastResponse = $this->client->request($method, $endpoint, $options);

			return json_decode($this->getBody());
		} catch (GuzzleException $th) {
			dd($th);

			throw $th;
		}
	}

	/**
	 * Returns the last request.
	 *
	 * @return ResponseInterface|null
	 */
	public function getResponse()
	{
		return $this->lastResponse;
	}

	/**
	 * Returns the last request status code.
	 *
	 * @return mixed|null
	 */
	public function getStatusCode()
	{
		return $this->lastResponse ? $this->lastResponse->getStatusCode() : null;
	}

	/**
	 * Returns the last request Body.
	 *
	 * @return mixed|null
	 */
	public function getBody()
	{
		return $this->lastResponse ? $this->lastResponse->getBody() : null;
	}

	protected function throwMethodNotFoundException($method = '')
	{
		throw new MethodNotFound('Call to undefined method '.self::class."::{$method}");
	}
}
