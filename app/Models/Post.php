<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Post extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'title',
        'image',
        'summary',
        'content',
        'cate_id',
        'user_id',
        'published',
    ];

    public function CatePost() {
        return $this->belongsTo('App\Models\CatePost', 'cate_id');
    }

    public function Users() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function Comment() {
        return $this->hasMany('App\Models\Comment', 'post_id');
    }

}
