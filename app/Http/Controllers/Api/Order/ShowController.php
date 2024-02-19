<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Resources\Order\OrderResource;
use App\Models\Order;

class ShowController extends BaseController
{
   public function __invoke(Order $order)
   {
       return new OrderResource($order);
   }
}
