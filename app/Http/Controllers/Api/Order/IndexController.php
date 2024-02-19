<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Resources\Order\OrderResource;
use App\Models\Order;


class IndexController extends BaseController
{
   public function __invoke()
   {

       $order = Order::orderBy('id', 'DESC')->get();

       return OrderResource::collection($order);
   }
}
