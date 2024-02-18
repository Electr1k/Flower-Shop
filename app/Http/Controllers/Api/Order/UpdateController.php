<?php

namespace App\Http\Controllers\Api\Order;

use App\Enums\OrderStatus;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;



class UpdateController extends BaseController
{
   public function __invoke(Order $order)
   {
       $data = request()->validate(['status' => 'required|string']);
       $order->update($data);
       return new OrderResource($order);
   }
}
