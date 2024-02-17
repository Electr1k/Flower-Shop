<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Web\Flower\BaseController;
use App\Http\Requests\Flower\FilterRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;

class IndexController extends BaseController
{
   public function __invoke(FilterRequest $request)
   {
//       $data = $request->validated();
//       $page = $data['page'] ?? 1;
//       $perPage = $data['per_page'] ?? null;
//       $filter = app()->make(FlowerFilter::class, ['queryParams' => array_filter($data)]);
//       $flowers = Flower::filter($filter)->orderBy('id', 'ASC');
//       if ($perPage != null){
//           $flowers = $flowers->paginate( $perPage,
//               ['*'],
//               'page',
//               $page
//           );
//       }
//       else $flowers = $flowers->orderBy('id', 'ASC')->get();
       $users = User::all();
       return UserResource::collection($users);
   }
}
