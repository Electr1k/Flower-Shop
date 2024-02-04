<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowerTag extends Model
{
    use HasFactory;
    protected $table = 'flower_tags';
    protected $guarded = false;
}
