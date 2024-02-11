<?php

namespace App\Http\Controllers\Api\Flower;

use App\Http\Controllers\Web\Flower\BaseController;
use App\Http\Filters\FlowerFilter;
use App\Http\Requests\Flower\FilterRequest;
use App\Http\Resources\Flower\FlowerResource;
use App\Models\Flower;

class IndexController extends BaseController
{
   public function __invoke(FilterRequest $request)
   {
       $data = $request->validated();
       $page = $data['page'] ?? 1;
       $perPage = $data['per_page'] ?? null;
       $filter = app()->make(FlowerFilter::class, ['queryParams' => array_filter($data)]);
       $flowers = Flower::filter($filter)->orderBy('id', 'ASC');
       if ($perPage != null){
           $flowers = $flowers->paginate( $perPage,
               ['*'],
               'page',
               $page
           );
       }
       else $flowers = $flowers->orderBy('id', 'ASC')->get();
       return FlowerResource::collection($flowers);
   }
}
