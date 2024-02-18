<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Requests\Order\StoreRequest;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Models\User;

class StoreController extends BaseController
{
   public function __invoke()
   {
       $user = User::find(auth()->user()->id);
       $products = ProductResource::collection($user->basket->products);
       $total_price = $products->sum(function($p){
           return $p->flower->price * $p->count;
       });
       if (!$products->count()) return response()->json(['message' => 'Your basket is empty'], 400);
       if ($total_price > $user->balance) return response()->json(['message' => 'Your balance is small'], 400);
       foreach ($products as $product) {
           if ($product->flower->count < $product->count) {
               return response()->json(['message' => 'We don\'t have to many flowers'], 400);
           }
       }
       $order = $this->service->store($user);
       return new OrderResource($order);
   }
}
