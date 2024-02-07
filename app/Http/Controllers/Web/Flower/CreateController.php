<?php

namespace App\Http\Controllers\Web\Flower;

use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaseController
{
   public function __invoke()
   {
       $categories = Category::all();
       $tags = Tag::all();
       return view('flower.create', compact('categories', 'tags'));
   }
}
