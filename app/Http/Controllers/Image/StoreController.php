<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Flower;
use App\Models\Image;
use App\Models\Tag;

class StoreController extends Controller
{
   public function __invoke(Flower $flower)
   {
       $data = request()->validate([
           'image' => 'string',
       ]);
       $data['flower_id'] = $flower->id;
       Image::create($data);
       return redirect()->route('flower.show', $flower->id);
   }
}
