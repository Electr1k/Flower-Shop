<?php

namespace App\Http\Controllers\Api\Flower;


use App\Http\Resources\Flower\FlowerResource;
use App\Http\Requests\Flower\UpdateRequest;
use App\Models\Flower;
class UpdateController extends BaseController
{
   public function __invoke(UpdateRequest $request, Flower $flower)
   {
       $data = $request->validated();
       $this->service->update($flower, $data);

       return new FlowerResource($flower);
   }
}
