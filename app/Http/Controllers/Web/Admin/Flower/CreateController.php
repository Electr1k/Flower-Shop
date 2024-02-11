<?php

namespace App\Http\Controllers\Web\Admin\Flower;

use App\Http\Controllers\Controller;
use App\Http\Filters\FlowerFilter;
use App\Http\Requests\Flower\FilterRequest;
use App\Models\Category;
use App\Models\Flower;
use App\Models\Tag;

class CreateController extends Controller
{
   public function __invoke()
   {
       $tags = Tag::all();
       $categories = Category::all();
       return view('admin.flower.create', compact('tags', 'categories'));
   }
}
