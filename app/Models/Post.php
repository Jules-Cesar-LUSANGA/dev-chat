<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function likes() : HasMany
    {
        return $this->hasMany(Like::class);
    }
    public function is_liked()
    {
        $like = self::likes()->where('user_id', Auth::id())->first();
        return $like;
    }
}
