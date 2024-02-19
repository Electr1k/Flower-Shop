<?php

namespace App\Http\Controllers\Web\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;

class ShowController extends Controller
{
    public function __invoke(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }
}
