<?php

namespace App;
use App;

use Config;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['image', 'status', 'slug', 'added_by', 'updated_by'];

    public function lang() {
        return $this->hasOne('App\PostTranslation')->where('locale', App::getLocale() )->withDefault();
    }
    
    public function getImage()
    {
        return asset('storage/' . $this->image);
    }

    public function isAvilable() {
        return $this->status ? true : false;
    }

    public function getStatus() {
        return $this->isAvilable() ? 'متاح' : 'غير متاح';
    }
    
}
