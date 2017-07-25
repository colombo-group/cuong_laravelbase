<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Comment extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['content', 'parent_id', 'post_id', 'user_id'];

    public function Post() {
        return $this->belongsTo('App\Models\Post','post_id');
    }

    public function Users() {
        return $this->belongsTo('App\User');
    }
}
