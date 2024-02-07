<?php

namespace App\Http\Controllers\Web\Admin\Flower;

use App\Http\Controllers\Controller;
use App\Http\Requests\Flower\StoreRequest;
use App\Models\Flower;

class StoreController extends Controller
{
   public function __invoke(StoreRequest $request)
   {
       $data = $request->validated();

       $flower = Flower::firstOrCreate($data);
       return redirect()->route('flower.index');
   }
}
