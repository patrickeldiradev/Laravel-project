<?php

namespace App;
use App;

use Config;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['image', 'status'];

    public function lang() {
        return $this->hasOne('App\PostTranslation')->where('locale', App::getLocale() )->withDefault();
    }
    
}
