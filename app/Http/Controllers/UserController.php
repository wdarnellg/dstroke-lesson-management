<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Players;
use App\User;
use Illuminate\Http\Request;
use Notifiable;

class UserController extends Controller
{
      /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->email;
    }
    
    public function storePlayer(Request $request, User $families)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'birthdate' => 'required'
        ]);
        $players = new Players;
        $players->fname = $request->fname;
        $players->lname = $request->lname;
        $players->gender = $request->gender;
        $players->birthdate = $request->birthdate;
        
        
        if($families->players()->save($players)){
            return back()->with(['success' => 'Family member successfully added.']);
        } else {
            return back()->with(['fail' => 'The attempt to save failed.']);
        }
    }
    
    public function getMyFamilyProfile(User $families)
    {
        $families = User::where('id', '=', Auth::user()->id)->with('players')->first(); 
        return view('auth.account.myfamilyprofile', compact('families'));
    }
    
    public function edit(user $user)
    {
        return view('admin.user.edit', compact('user'));
    }
    
    public function update(Request $request, User $families)
    {
       if($families->update($request->all())) {
               return back()->with(['success' => 'user successfully edited.']);
        } else {
            return back()->with(['fail' => 'The attempt to edit failed.']);
        }
    }
}
