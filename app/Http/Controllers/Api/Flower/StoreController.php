<?php

namespace App\Http\Controllers\Api\Flower;

use App\Http\Requests\Flower\StoreRequest;
use App\Http\Resources\Flower\FlowerResource;

class StoreController extends BaseController
{
   public function __invoke(StoreRequest $request)
   {
       $data = $request->validated();
       $flower = $this->service->store($data);
       return new FlowerResource($flower);
   }
}
