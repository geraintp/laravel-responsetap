<?php

namespace Tests\Unit;

use Geraintp\LaravelResponseTap\ResponseTap;
use Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    public function test_service_provider_bindings()
    {
        $responseTap = app(ResponseTap::class);
        $this->assertInstanceOf(ResponseTap::class, $responseTap);
    }

    public function test_api_key_set()
    {
        $responseTap = app(ResponseTap::class);
        $this->assertEquals(env('RESPONSETAP_API_KEY'), $responseTap->key);
    }
}
