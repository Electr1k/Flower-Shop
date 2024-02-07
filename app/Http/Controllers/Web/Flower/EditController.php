<?php

namespace App\Http\Controllers\Web\Flower;

use App\Models\Category;
use App\Models\Flower;
use App\Models\Tag;

class EditController extends BaseController
{
   public function __invoke(Flower $flower)
   {
       $categories = Category::all();
       $tags = Tag::all();
       return view('flower.edit', compact('flower', 'categories', 'tags'));
   }
}
