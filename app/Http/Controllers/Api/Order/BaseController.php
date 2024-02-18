<?php

namespace App\Http\Controllers\Api\Order;
use App\Http\Controllers\Controller;
use App\Services\Order\Service;

class BaseController extends Controller
{
    public Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
