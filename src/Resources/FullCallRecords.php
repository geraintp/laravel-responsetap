<?php

namespace Geraintp\LaravelResponseTap\Resources;

class FullCallRecords extends AbstractResource implements ResourceInterface
{
	/**
	 * @var string
	 */
	protected $endpoint = 'fullCallRecords';

	public function all()
	{
		$this->throwMethodNotFoundException('all');
	}

	public function create(array $data)
	{
		$this->throwMethodNotFoundException('create');
	}

	public function get(int $id)
	{
		$this->throwMethodNotFoundException('get');
	}

	public function update(int $id, array $data)
	{
		$this->throwMethodNotFoundException('update');
	}

	public function delete(int $id)
	{
		$this->throwMethodNotFoundException('delete');
	}
}
