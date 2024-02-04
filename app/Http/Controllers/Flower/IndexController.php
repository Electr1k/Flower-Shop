<?php

namespace App\Http\Controllers\Flower;

use App\Http\Controllers\Controller;
use App\Models\Flower;

class IndexController extends BaseController
{
   public function __invoke()
   {
       $flowers = Flower::orderBy('id', 'asc')->get();
       return view('flower.index', compact('flowers'));
   }
}
