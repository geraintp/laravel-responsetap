<?php

namespace Geraintp\LaravelResponseTap;

use GuzzleHttp\Client as GuzzleClient;

class ResponseTap
{
	/**
	 * @var GuzzleClient
	 */
	private $client = null;

	/**
	 * @var array
	 */
	private $headers = [
		'Accept' => 'application/json',
		'Content-Type' => 'application/json',
	];

	public function __construct(array $config)
	{
		$this->client = new GuzzleClient([
			'base_uri' => "{$config['url']}/{$config['account_id']}/",
			'headers' => $this->headers,
			'auth' => [
				$config['username'],
				$config['key'],
			],
		]);
	}

	/**
	 * Return an instance of a Resource based on the method called.
	 *
	 * @param string $name
	 * @param array  $arguments
	 *
	 * @return \Geraintp\ResponseTap\Resources\ResourceInterface
	 */
	public function __call($name, $arguments = null)
	{
		$resource = 'Geraintp\\LaravelResponseTap\\Resources\\'.ucfirst($name);

		return new $resource($this->client);
	}
}
