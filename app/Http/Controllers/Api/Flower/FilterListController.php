<?php

namespace App\Http\Controllers\Api\Flower;

use App\Http\Requests\Flower\FilterRequest;
use App\Models\Category;
use App\Models\Flower;
use App\Models\Tag;

class FilterListController extends BaseController
{
   public function __invoke(FilterRequest $request)
   {
       $categories = Category::all();
       $tags = Tag::all();
       $priceFrom = Flower::orderBy('price', 'ASC')->first()->price;
       $priceTo = Flower::orderBy('price', 'DESC')->first()->price;
       $result = [
           'categories' => $categories,
           'tags' => $tags,
           'price' => ['from' => $priceFrom, 'to' => $priceTo]
       ];
       return response()->json($result);
   }
}
