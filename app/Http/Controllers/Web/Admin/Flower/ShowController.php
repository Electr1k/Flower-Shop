<?php

namespace App\Http\Controllers\Web\Admin\Flower;

use App\Http\Controllers\Controller;
use App\Models\Flower;

class ShowController extends Controller
{
   public function __invoke(Flower $flower)
   {
       return view('admin.flower.show', compact('flower'));
   }
}
