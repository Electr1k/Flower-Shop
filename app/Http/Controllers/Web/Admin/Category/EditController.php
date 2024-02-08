<?php

namespace App\Http\Controllers\Web\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Flower;

class EditController extends Controller
{
   public function __invoke(Category $category)
   {
       return view('admin.category.edit', compact('category'));
   }
}
