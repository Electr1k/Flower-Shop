<?php

namespace App\Services\User;



use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Service
{

    public function store($data): User|null
    {
        try {
            DB::beginTransaction();
            if ($this->checkEmail($data['email'])) throw HttpResponseException(response()->json(['message' => 'User already exist']), 400);
            $user = User::create($data);
            Db::commit();
            return $user;
        } catch (\Exception $exception) {
            Db::rollBack();
        }
        return null;
    }

    public function checkEmail(string $email): bool {
        $user = User::where('email', $email)->first();
        return $user != null;
    }

    public function login($data): string
    {

        if (! Auth::guard('web')->attempt(['email' => $data['email'], 'password' => $data['password']])){
            return response()->json(['message' => 'Неверный логин или пароль'], 401);
        }

        $user = Auth::guard('web')->user();

        $token = $user->createToken('login');
        return $token->plainTextToken;
    }

    public function update(User $user, $data): User
    {
        $user->update($data);

        return $user;
    }
}
