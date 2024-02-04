<?php

namespace App\Http\Controllers\Flower;

use App\Http\Controllers\Controller;
use App\Http\Requests\Flower\StoreRequest;
use App\Models\Flower;

class StoreController extends Controller
{
   public function __invoke(StoreRequest $request)
   {
       $data = $request->validated();
       $tags = $data['tags'];
       unset($data['tags']);
       $flower = Flower::create($data);
       $flower->tags()->attach($tags);
       return redirect()->route('flower.index');
   }
}
