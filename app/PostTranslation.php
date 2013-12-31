<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    protected $fillable = ['post_id', 'title', 'description', 'locale'];

    public function post() {
        return $this->belongsTo('App\Post');
    }

}
