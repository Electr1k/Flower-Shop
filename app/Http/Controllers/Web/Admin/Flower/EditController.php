<?php

namespace App\Http\Controllers\Web\Admin\Flower;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Flower;
use App\Models\Tag;

class EditController extends Controller
{
   public function __invoke(Flower $flower)
   {
       $tags = Tag::all();
       $categories = Category::all();
       return view('admin.flower.edit', compact('flower', 'tags', 'categories'));
   }
}
