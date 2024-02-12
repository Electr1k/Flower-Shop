<?php

namespace App\Http\Controllers\Api\Flower;



use App\Models\Flower;

class DestroyController extends BaseController
{
   public function __invoke(Flower $flower)
   {
       if ($flower) $flower->delete();
       else return response()->json(['message' => 'Flower not found'])->setStatusCode(404);
       return true;
   }
}
