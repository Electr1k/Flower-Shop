<?php

namespace App\Http\Controllers\Web\Flower;

use App\Models\Flower;

class DestroyController extends BaseController
{
   public function __invoke(Flower $flower)
   {
       $flower->delete();
       return redirect()->route('flower.index');
   }
}
