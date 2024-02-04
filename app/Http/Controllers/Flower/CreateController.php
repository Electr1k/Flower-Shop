<?php

namespace App\Http\Controllers\Flower;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Flower;
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
