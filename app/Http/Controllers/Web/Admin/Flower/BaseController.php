<?php

namespace App\Http\Controllers\Web\Admin\Flower;

use App\Http\Controllers\Controller;
use App\Services\Flower\Service;

class BaseController extends Controller
{
    protected Service $flowerService;
    public function __construct(Service $service)
    {
        $this->flowerService = $service;
    }
}
