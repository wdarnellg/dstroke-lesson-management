<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Packages;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth;
use Stripe\Stripe;
use Stripe\Charge;

class FrontController extends Controller
{
    public function getIndex()
    {
        $packages = Packages::all();
        return view('front.home', ['packages' => $packages]);
    }
    
    public function packages()
    {
        $packages = Packages::all();
        return view('front.packages', compact('packages'));
    }
    
    public function package($id)
    {
        $packages = Packages::find($id);
        return view('front.package', compact('packages'));
    }
    
}