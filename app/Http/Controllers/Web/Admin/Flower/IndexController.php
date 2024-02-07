<?php

namespace App\Http\Controllers\Web\Admin\Flower;

use App\Http\Controllers\Controller;
use App\Http\Requests\Flower\FilterRequest;
use App\Models\Flower;

class IndexController extends Controller
{
   public function __invoke(FilterRequest $request)
   {
       $data = $request->validated();
        $flowers = Flower::all();
//       $filter = app()->make(FlowerFilter::class, ['queryParams' => array_filter($data)]);
//       $flowers = Flower::filter($filter)->paginate(25);
       return view('admin.flower.index', compact('flowers'));
   }
}
