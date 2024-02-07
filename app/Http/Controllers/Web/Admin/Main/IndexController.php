<?php

namespace App\Http\Controllers\Web\Admin\Main;

use App\Http\Controllers\Controller;
use App\Http\Filters\FlowerFilter;
use App\Http\Requests\Flower\FilterRequest;
use App\Models\Flower;

class IndexController extends Controller
{
   public function __invoke()
   {
       return view('admin.index');
   }
}
