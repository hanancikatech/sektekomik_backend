<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Posts extends Model
{
    use HasFactory;


    public function Videos(): HasMany 
    {
        return $this->hasMany(Videos::class, 'posts_id');
    }
}
