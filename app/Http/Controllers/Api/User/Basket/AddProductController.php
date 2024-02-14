<?php

namespace App\Http\Controllers\Api\User\Basket;

use App\Http\Controllers\Api\User\BaseController;
use App\Http\Requests\Product\StoreRequest;
use App\Models\User;

class AddProductController extends BaseController
{
   public function __invoke(User $user, StoreRequest $request)
   {
       $data = $request->validated();
       $user = $this->service->addProduct($user, $data);
       return $user;
   }
}
