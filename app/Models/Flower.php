<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flower extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'flowers';
    protected $guarded = false;

    public function images()
    {
        return $this->hasMany(Image::class, 'flower_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'flower_tags', 'flower_id', 'tag_id');
    }
}
