<?php

namespace App\Http\Controllers\Api\Flower;

use App\Http\Resources\Flower\FlowerResource;
use App\Models\Flower;

class ShowController extends BaseController
{
   public function __invoke(Flower $flower)
   {
       return new FlowerResource($flower);
   }
}
