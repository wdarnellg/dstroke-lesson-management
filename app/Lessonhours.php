<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;



class Lessonhours extends Model
{
    use Notifiable;
    
    protected $fillable = array('signup_date', 'packages_id');
    
    public $table = "lessonhours";
    
    public function players()
    {
        return $this->belongsToMany('App\Players', 'lessonhour_player', 'lessonhours_id', 'players_id')
                                        ->withTimestamps();
    }
    
    public function hoursused()
    {
       return $this->hasMany('App\Hoursused', 'lessonhours_id');
    }
    
    public function packages()
    {
        return $this->belongsTo('App\Packages', 'packages_id');
    }
    
    
    
    protected $dates = ['signup_date'];
    protected $touches = ['players'];
    
    public function setSignUpDateAttribute($value)
    {
        $this->attributes['signup_date'] = Carbon::createFromFormat('m/d/Y', $value);
    }
}
