<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Basket\BasketResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'age' => $this->age,
            'address' => $this->address,
            'gender' => $this->gender,
            'isAdmin' => $this->isAdmin,
            'basket' => new BasketResource($this->basket),
            'balance' => $this->balance
        ];
    }
}
