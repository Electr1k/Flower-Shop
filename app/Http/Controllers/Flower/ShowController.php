<?php

namespace App\Http\Controllers\Flower;

use App\Http\Controllers\Controller;
use App\Models\Flower;

class ShowController extends Controller
{
   public function __invoke(Flower $flower)
   {
       return view('flower.show', compact('flower'));
   }
}