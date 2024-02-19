<?php

namespace App\Http\Controllers\Web\Admin\Main;

use App\Http\Controllers\Controller;
use App\Http\Filters\FlowerFilter;
use App\Http\Requests\Flower\FilterRequest;
use App\Models\Category;
use App\Models\Flower;
use App\Models\Order;
use App\Models\Tag;
use App\Models\User;

class IndexController extends Controller
{
   public function __invoke()
   {
       $users = User::all();
       $flowers = Flower::all();
       $orders = Order::all();
       $categories = Category::all();
       $tags = Tag::all();
       return view('admin.index', compact('users', 'flowers', 'orders', 'categories', 'tags'));
   }
}
