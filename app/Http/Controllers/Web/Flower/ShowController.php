<?php

namespace App\Http\Controllers\Web\Flower;

use App\Models\Flower;

class ShowController extends BaseController
{
   public function __invoke(Flower $flower)
   {
       return view('flower.show', compact('flower'));
   }
}
