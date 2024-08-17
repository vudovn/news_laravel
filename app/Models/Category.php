<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'meta_keyword',
        'meta_title',
        'meta_description',
        'parent_id',
    ];

    protected $table = "categories";

    public function chills()
    {
        return $this->hasMany(Category::class, "parent_id", "id");
    }

    public function allChildren()
    {
        return $this->chills()->with('allChildren');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
