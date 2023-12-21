<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'color',
        'category',
        'content',
        'thumbnail',
        'tags',
        'published',
        'category_id',
    ];
    protected $casts = [
        'tags'=> 'array'
    ];
    
    public function category (){
        return $this->belongsTo(Category::class);
    }

    public function authors (){
        return $this->belongsToMany(User::class, 'post_user')->withPivot(['order'])->withTimestamps();
    }

    public function comments (){
        return $this->morphMany(Comment::class, 'commentable');
    }

}
