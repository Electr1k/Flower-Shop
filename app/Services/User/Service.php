<?php

namespace App\Services\User;



use App\Models\Basket;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Service
{

    public function store($data): User|null
    {
        try {
            DB::beginTransaction();
            if ($this->checkEmail($data['email'])) throw HttpResponseException(response()->json(['message' => 'User already exist']), 400);
            $user = User::create($data);
            $basket = Basket::firstOrCreate(['user_id' => $user->id]);
            $user->basket_id = $basket->id;
            $user->save();
            Db::commit();
            return $user;
        } catch (\Exception $exception) {
            Db::rollBack();
            dd($exception);
        }
        return null;
    }

    public function checkEmail(string $email): bool {
        $user = User::where('email', $email)->first();
        return $user != null;
    }

    public function login($data): string
    {

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return $user->createToken('login')->plainTextToken;
    }

    public function update(User $user, $data): User
    {
        $user->update($data);

        return $user;
    }

    public function addProduct(User $user, $data): User
    {
        try {
            DB::beginTransaction();
            $data['basket_id'] = $user->basket_id;
            $product = Product::create($data);
            Db::commit();
            $user->refresh();
            return $user;
        } catch (\Exception $exception) {
            Db::rollBack();
        }
        return $user;
    }

    public function removeProduct(Product $product): bool    {
        try {
            $product->delete();
            return true;
        }
        catch (\Exception $e){
            return false;
        }
    }
}
