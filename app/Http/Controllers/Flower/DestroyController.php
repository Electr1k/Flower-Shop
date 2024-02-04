<?php

namespace App\Http\Controllers\Flower;

use App\Http\Controllers\Controller;
use App\Models\Flower;

class DestroyController extends BaseController
{
   public function __invoke(Flower $flower)
   {
       $flower->delete();
       return redirect()->route('flower.index');
   }
}
