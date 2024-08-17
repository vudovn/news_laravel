<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'short_content',
        'content',
        'thumbnail',
        'status',
        'rank',
        'user_id', 
        'meta_keyword',
        'meta_title',
        'meta_description'
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }


}
