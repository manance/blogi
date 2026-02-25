<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["content", "category_id"];

    public function comments(): HasMany{
        return $this->HasMany(Comment::class);
    }
}
