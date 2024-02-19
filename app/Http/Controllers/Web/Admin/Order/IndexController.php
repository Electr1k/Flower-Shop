<?php

namespace App\Http\Controllers\Web\Admin\Order;

use App\Models\Order;

class IndexController extends BaseController
{
   public function __invoke()
   {
       $orders = Order::orderBy('id', 'ASC')->get();

       return view('admin.order.index', compact('orders'));
   }
}
