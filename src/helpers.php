<?php

if (!function_exists('responseTap')) {
    /**
     * Get the ResponseTap instance.
     *
     * @return \Geraintp\LaravelResponseTap\ResponseTap
     */
    function responseTap()
    {
        return app(\Geraintp\LaravelResponseTap\ResponseTap::class);
    }
}
