<?php

namespace App\Http\Controllers\Image;
use App\Http\Controllers\Controller;
use App\Services\Image\Service;

class BaseController extends Controller
{
    public Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
