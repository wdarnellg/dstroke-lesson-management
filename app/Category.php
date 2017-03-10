<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $fillable=['name'];
    public function packages()
    {
//        return $this->hasMany('App\Packages');
        return $this->hasMany(Packages::class);
    }
}
