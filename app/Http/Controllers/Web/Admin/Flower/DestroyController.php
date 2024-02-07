<?php

namespace App\Http\Controllers\Web\Admin\Flower;

use App\Http\Controllers\Controller;
use App\Http\Filters\FlowerFilter;
use App\Http\Requests\Flower\FilterRequest;
use App\Models\Flower;

class DestroyController extends Controller
{
   public function __invoke(Flower $flower)
   {
       $flower->delete();
       return redirect()->route('flower.index');
   }
}
