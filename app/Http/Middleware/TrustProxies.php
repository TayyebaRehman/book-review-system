<?php
namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    protected $proxies;

    // Use AWS_ELB for Laravel 12+ or newer server environments
    protected $headers = Request::HEADER_X_FORWARDED_AWS_ELB;
}
