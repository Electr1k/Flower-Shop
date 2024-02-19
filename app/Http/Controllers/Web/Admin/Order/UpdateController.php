<?php

namespace App\Http\Controllers\Web\Admin\Order;


use App\Models\Order;

class UpdateController extends BaseController
{
   public function __invoke(Order $order)
   {
       $data = request()->validate(['status' => 'required|string']);
       $order->update($data);
       return view('admin.order.show', compact('order'));
   }
}
