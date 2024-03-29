<?php

namespace App\Http\Controllers\Api\Flower;
use App\Http\Controllers\Controller;
use App\Services\Flower\Service;

class BaseController extends Controller
{
    public Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
