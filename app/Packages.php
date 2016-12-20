<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Packages extends Model
{
    public $table = "packages";
    
    protected $fillable = array('name', 'cost', 'numberofhours', 'type');
    
    public function lessonhours()
    {
        return $this->hasMany('App\Lessonhours', 'packages_id');
    }
    
    public function sharedlessonhours()
    {
        return hasMany('App\SharedLessonhoursharedlessonhours');
    }
    
}
