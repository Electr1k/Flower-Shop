<?php

namespace App\Http\Controllers\Web\Flower;

use App\Http\Filters\FlowerFilter;
use App\Http\Requests\Flower\FilterRequest;
use App\Models\Flower;

class IndexController extends BaseController
{
   public function __invoke(FilterRequest $request)
   {
       $data = $request->validated();

       $filter = app()->make(FlowerFilter::class, ['queryParams' => array_filter($data)]);
       $flowers = Flower::filter($filter)->paginate(25);
       return view('flower.index', compact('flowers'));
   }
}
