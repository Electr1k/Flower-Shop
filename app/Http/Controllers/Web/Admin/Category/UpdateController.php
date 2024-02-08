<?php

namespace App\Http\Controllers\Web\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Flower;

class UpdateController extends Controller
{
   public function __invoke(UpdateRequest $request, Category $category)
   {
       $data = $request->validated();

       $category->update($data);
       return view('admin.category.show', compact('category'));
   }
}
