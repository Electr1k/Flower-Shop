<?php

namespace App\Http\Controllers\Web\Image;

use App\Http\Requests\Image\StoreRequest;
use App\Models\Flower;

class StoreController extends BaseController
{
   public function __invoke(StoreRequest $request, Flower $flower)
   {
       $data = $request->validated();

       $this->service->store($flower, $data);

       return redirect()->route('flower.show', $flower->id);
   }
}
