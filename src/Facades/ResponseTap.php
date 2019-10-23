<?php

namespace Geraintp\LaravelResponseTap\Facades;

/**
 * @method static void addMessage(mixed $message, string $label = 'info')
 * @method static void alert(string $message)
 *
 * @see \Geraintp\ResponseTap\ResponseTap
 */
class ResponseTap extends \Illuminate\Support\Facades\Facade
{
	/**
	 * {@inheritdoc}
	 */
	protected static function getFacadeAccessor()
	{
		return \Geraintp\LaravelResponseTap\ResponseTap::class;
	}
}
