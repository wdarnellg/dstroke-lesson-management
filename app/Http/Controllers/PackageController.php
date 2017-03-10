<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Packages;
use Illuminate\Http\Request;
use App\Category;

use App\Http\Requests;
use Session;
use Auth;
use Stripe\Stripe;
use Stripe\Charge;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Packages::all();
        return view('admin.packages.index', ['packages' => $packages]);
    }
    
    public function packages()
    {
        $packages = Packages::all();
        return view('front.packages', compact('packages'));
    }
    
    public function package()
    {
        $packages = Packages::all();
        return view('front.package', compact('packages'));
    }
    
    public function create()
    {
        $categories=Category::pluck('name','id');
        return view('admin.packages.create',compact('categories'));
    }
    
    public function store(Request $request)
    {
        $formInput=$request->except('image');
//        validation
        $this->validate($request,[
            'name'=>'required',
            'numberofhours'=>'required',
            'cost'=>'required',
            'imagepath'=>'image|mimes:png,jpg,jpeg|max:10000'
        ]);
//        image upload
        $image=$request->imagepath;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image']=$imageName;
        }
        Packages::create($formInput);
        return redirect()->route('package.index');
    }
    
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
