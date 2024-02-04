<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\StoreRequest;
use App\Models\Category;
use App\Models\Flower;
use App\Models\Image;
use App\Models\Tag;

class StoreController extends Controller
{
   public function __invoke(StoreRequest $request, Flower $flower)
   {
       $data = $request->validated();
       $data['flower_id'] = $flower->id;
       Image::create($data);
       return redirect()->route('flower.show', $flower->id);
   }
}
