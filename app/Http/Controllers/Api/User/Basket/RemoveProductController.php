<?php

namespace App\Http\Controllers\Api\User\Basket;

use App\Http\Controllers\Api\User\BaseController;
use App\Http\Requests\Product\DestroyRequest;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use App\Models\User;

class RemoveProductController extends BaseController
{
   public function __invoke(User $user, DestroyRequest $request)
   {
       $product = Product::find($request->validated()['id']);

       return $this->service->removeProduct($product);
   }
}
