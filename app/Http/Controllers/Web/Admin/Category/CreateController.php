<?php

namespace App\Http\Controllers\Web\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Filters\FlowerFilter;
use App\Http\Requests\Flower\FilterRequest;
use App\Models\Flower;

class CreateController extends Controller
{
   public function __invoke()
   {
       return view('admin.category.create');
   }
}
