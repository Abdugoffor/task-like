<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'news_id', 'text'];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
