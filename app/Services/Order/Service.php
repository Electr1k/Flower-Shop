<?php

namespace App\Services\Order;


use App\Http\Resources\Product\ProductResource;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Service
{

    public function store(User $user): Order|null
    {
        try {
            DB::beginTransaction();
            $products = ProductResource::collection($user->basket->products);
            $total_price = $products->sum(function($p){
                return $p->flower->price * $p->count;
            });
            $order = Order::create([
                'products' => json_encode($products),
                'total_price' => $total_price,
                'user_id' => $user->id
            ]);
            Product::where('basket_id', $user->basket->id)->delete();
            $user->update(['balance' => $user->balance - $total_price]);
            DB::commit();
            return $order;
        }
        catch (\Exception $exception){
            DB::rollBack();
        }
        return null;
    }
}
