<?php

namespace App\Http\Controllers\Flower;

use App\Http\Controllers\Controller;
use App\Http\Requests\Flower\UpdateRequest;
use App\Models\Flower;

class UpdateController extends Controller
{
   public function __invoke(UpdateRequest $request, Flower $flower)
   {
       $data = $request->validated();
       $tags = $data['tags'];
       unset($data['tags']);
       $flower->update($data);
       $flower->tags()->sync($tags);
       return redirect()->route('flower.show', $flower->id);
   }
}
