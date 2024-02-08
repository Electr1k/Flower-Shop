<?php

namespace App\Http\Controllers\Web\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Filters\FlowerFilter;
use App\Http\Requests\Flower\FilterRequest;
use App\Models\Category;
use App\Models\Flower;

class DestroyController extends Controller
{
   public function __invoke(Category $category)
   {
       $category->delete();
       return redirect()->route('category.index');
   }
}
