<?php

namespace App\Http\Controllers\Flower;

use App\Http\Controllers\Controller;
use App\Models\Flower;

class StoreController extends Controller
{
   public function __invoke()
   {
       $data = request()->validate([
           'title' => 'string',
           'description' => 'string',
           'category_id' => '',
           'tags' => ''
       ]);
       $tags = $data['tags'];
       unset($data['tags']);
       $flower = Flower::create($data);
       $flower->tags()->attach($tags);
       return redirect()->route('flower.index');
   }
}
