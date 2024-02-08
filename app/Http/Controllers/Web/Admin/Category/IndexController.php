<?php

namespace App\Http\Controllers\Web\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Flower\FilterRequest;
use App\Models\Category;
use App\Models\Flower;

class IndexController extends Controller
{
   public function __invoke()
   {
        $categories = Category::all();

       return view('admin.category.index', compact('categories'));
   }
}
