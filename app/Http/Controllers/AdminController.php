<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Players;
use App\Packages;
use App\Lessonhours;
use App\Hoursused;
use Illuminate\Support\Facades\Event;
use Collective\Html\FormFacade;
use Collective\Html\HtmlFacade;
use Illuminate\Notifications\Messages\MailMessage;
use Notification;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ThankYouForLessonHoursPurchase;
use App\Notifications\HoursusedPosted;
use App\Mail\ThankYouForLessonPackagePurchase;
use App\Mail\LessonhoursRecorded;
use DB;
use Mail;



class AdminController extends Controller
{
    //User-FamilyPlayer functions///
    public function getusers()
    {
         $users = User::orderBy('familyname')->paginate(5);
        return view('admin.users.users', compact('users'));
    }
    
    public function FamilyEdit(User $families)
    {
        return view('admin.users.familyedit', compact('families'));
    }
    
    public function FamilyUpdate(Request $request, User $users)
    { 
        if($users->update($request->all())) {
               return back()->with(['success' => 'Family successfully edited.']);
        } else {
            return back()->with(['fail' => 'The attempt to edit failed.']);
        }
    }
    
    public function showFamily(User $families)
    {
        return view('admin.users.familyshow', compact('families'));
    }
    
    public function show(User $user)
    {
        return view('admin.user.user-profile', compact('user'));
    }
    
    public function storeUser(Request $request)
    {
        $this->validate($request, [
                'familyname' => 'required|unique:users',
                'phone' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:4'
            ]);
            $user = new User();
            $user->familyname = $request['familyname'];
            $user->phone = $request['phone'];
            $user->email = $request['email'];
            $user->password = bcrypt($request->input('password'));
            
            if($user->save()){
               return back()->with(['success' => 'user successfully created.']);
        } else {
            return back()->with(['fail' => 'The attempt to create failed.']);
        }
            
    }
    //End User-Family functions///
    
    //Player functions
    
    public function getplayers()
    {
            $players = Players::orderBy('lname')->with('lessonhours')->paginate(10);
            return view('admin.players.players', compact('players'));
    }
     
    public function playershow(Players $players,  Packages $packages)
    {
        $selectPlayers = Players::select(DB::raw("CONCAT(fname, ' ', lname) AS players"), 'id')->orderBy('lname')->pluck('players', 'id');
        $packages = Packages::orderBy('name')->pluck('name', 'id');
        
        return view('admin.players.playerprofile', compact('players', 'selectPlayers', 'packages'));
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
            return back()->with(['success' => 'Player successfully added.']);
        } else {
            return back()->with(['fail' => 'The attempt to save failed.']);
        }
    }
    //End Player functions///
    
    //Lessonhours functions///
    public function Lessonhoursshow(Lessonhours $lessonhours)
    {
        return view('admin.lessonhours.lessonhours', compact('lessonhours'));
    }
    
    public function getLessonhours()
    {
        $lessonhours = Lessonhours::orderBy('signup_date', 'desc')->with('hoursused')->get();
        
        return view('admin.lessonhours.lessonhours', compact('lessonhours'));
    }
    
    public function LessonhoursEdit(Lessonhours $lessonhours, Packages $packages)
    {
        $packages = Packages::orderBy('type')->orderBy('name')->get();
        
        return view('admin.lessonhours.lessonhoursedit', compact('lessonhours', 'packages', 'players'));
    }
    
    public function LessonhoursUpdate(Request $request, Lessonhours $lessonhours)
    { 
        if($lessonhours->update($request->all())) {
               return back()->with(['success' => 'Lessonhours successfully edited.']);
        } else {
            return back()->with(['fail' => 'The attempt to edit failed.']);
        }
    }
    
    public function storeLessonHours(Request $request, Players $players)
    {
        $this->validate($request, [
            'packages_id' => 'required|numeric',
            'signup_date' => 'required',
            'players'    => 'required',
            'players.*' => 'exists:players,id'
        ]);
        
        $lessonhours = Lessonhours::create($request->all()); 
      
        $lessonhours->players()->attach($request->players);
        
       Players::with('users')->whereIn('id', $request->players)->get()
        ->each(function ($player) use ($lessonhours) {
        Mail::to($player->users)->bcc('dstroketennis@gmail.com')->send(new ThankYouForLessonPackagePurchase($lessonhours));
        });
        
        return back()->with(['success' => 'Player is enrolled in new Lesson Package.']);
        
    }

    //End Lessonhours functions
    
    //Hoursused functions///
    public function getHoursused()
    {
        $hoursused = Hoursused::orderBy('date_time', 'desc')->get();
        return view('admin.hoursused.hoursused', compact('hoursused'));
    }
    
    public function storeHoursused(Request $request, Lessonhours $lessonhours)
    { 
        $this->validate($request, [
            'date_time' => 'required',
            'numberofhours' => 'required|numeric',
            'comments' => 'required|max:700'
        ]);
        
        $hoursused = new Hoursused();
        $hoursused->date_time = $request['date_time'];
        $hoursused->numberofhours = $request['numberofhours'];
        $hoursused->comments = $request['comments'];
        $lessonhours->hoursused()->save($hoursused);
       
       $mail = $lessonhours->players->pluck('users.email'); 
        Mail::to($mail)->bcc('dstroketennis@gmail.com')->send(new LessonhoursRecorded($lessonhours, $hoursused)); 
      
        return back()->with(['success' => 'Hours Used successfully added!']); 
            
    }
    
    public function HoursusedEdit(Hoursused $hoursused)
    {
        return view('admin.hoursused.hoursusededit', compact('hoursused'));
    }
    
    public function HoursusedUpdate(Request $request, Hoursused $hoursused)
    {
        if($hoursused->update($request->all())) {
               return back()->with(['success' => 'Hoursused successfully edited.']);
        } else {
            return back()->with(['fail' => 'The attempt to edit failed.']);
        }
    }
    //End Hoursused functions///
    
    //Packages functions///
    
    public function getPackageform()
    {
        $packages = Packages::orderBy('type')->orderBy('name')->paginate(4);
        return view('admin.packages.packageform', compact('packages'));
    }
    
    public function PackageEdit(Packages $packages)
    { 
        return view('admin.packages.packageedit', compact('packages'));
    }
    
    public function PackageUpdate(Request $request, Packages $packages)
    { 
        if($packages->update($request->all())) {
               return back()->with(['success' => 'Packages successfully edited.']);
        } else {
            return back()->with(['fail' => 'The attempt to edit failed.']);
        }
    }
    
    public function postCreatePackage(Request $request)
    {
        $this->validate($request, [
                'name' => 'required',
                'cost' => 'required|numeric',
                'numberofhours' => 'required|numeric',
                'type' => 'required'
            ]);
            $packages = new Packages();
            $packages->name = $request['name'];
            $packages->cost = $request['cost'];
            $packages->numberofhours = $request['numberofhours'];
            $packages->type = $request['type'];
            
            if($packages->save()){
               return back()->with(['success' => 'Package successfully created!']); 
            } else {
                return back()->with(['fail' => 'Something went wrong!']);
            }
    }
    
    //EndPackages functions
    
}
