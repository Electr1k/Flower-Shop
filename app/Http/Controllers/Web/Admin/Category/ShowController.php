<?php

namespace App\Http\Controllers\Web\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Flower;

class ShowController extends Controller
{
   public function __invoke(Category $category)
   {
       return view('admin.category.show', compact('category'));
   }
}
