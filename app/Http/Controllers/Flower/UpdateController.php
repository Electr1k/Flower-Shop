<?php

namespace App\Http\Controllers\Flower;

use App\Http\Controllers\Controller;
use App\Models\Flower;

class UpdateController extends Controller
{
   public function __invoke(Flower $flower)
   {
       $data = request()->validate([
           'title' => 'string',
           'description' => 'string',
           'category_id' => '',
           'tags' => '',
       ]);
       $tags = $data['tags'];
       unset($data['tags']);
       $flower->update($data);
       $flower->tags()->sync($tags);
       return redirect()->route('flower.show', $flower->id);
   }
}
