<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $guarded = false;

    public function flowers()
    {
        return $this->belongsToMany(Flower::class, 'flower_tags', 'tag_id', 'flower_id');
    }
}
