<?php

namespace Tests\Unit;

use Tests\TestCase;
use Geraintp\LaravelResponseTap\ResponseTap;

class ServiceProviderTest extends TestCase
{
	public function test_service_provider_bindings()
	{
		$responseTap = app(ResponseTap::class);
		$this->assertInstanceOf(ResponseTap::class, $responseTap);
	}

	public function test_api_key_set()
	{
		$hubspot = app(HubSpot::class);
		$this->assertEquals(env('HUBSPOT_API_KEY'), $hubspot->client->key);
	}
}
