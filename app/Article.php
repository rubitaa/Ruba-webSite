<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable=[
        'title',
        'user_id',
        'content'
    ];

    protected $dates=['deleted_at'];

    public function user(){
        return $this->belongsTo(User::Class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
