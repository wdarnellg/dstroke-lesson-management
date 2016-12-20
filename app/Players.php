<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use Carbon\Carbon;


class Players extends Model
{
    public $table = "players";
    
    protected $fillable = array('fname', 'lname', 'gender', 'birthdate');
    
    
    public function users()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
    
    public function lessonhours()
    {
        return $this->belongsToMany('App\Lessonhours', 'lessonhour_player', 'players_id', 'lessonhours_id' );
    }
    
    public function getFullName($id)
    {
        return ucfirst($this->fname ) . ' ' . ucfirst($this->lname);
    }
    
    protected $dates = ['birthdate'];
    protected $touches = ['lessonhours'];
    
    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = Carbon::createFromFormat('m/d/Y', $value);
    }
}
