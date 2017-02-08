<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Mail\ThankYouForLessonPackagePurchase;

Route::get('/', function () {
        return view('welcome');
    });
    
Route::get('/home', [
        'uses' => 'FrontController@getIndex',
        'as' => 'home'
        ]);

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');




//Admin Routes///////////////////////////////////////////////////////////////////////////


Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function () {
    Route::post('toggledeliver/{orderId}', 'OrderController@toggledeliver')->name('toggle.deliver');
    Route::get('/', function () {return view('admin.index'); })->name('admin.index');
    Route::resource('package','PackageController');
    Route::resource('category','CategoriesController');
    Route::get('orders/{type?}', 'OrderController@Orders');
});
    Route::get('/dashboard', 'HomeController@admin')->middleware('admin');
    Route::auth();
    Route::get('/packageform', 'AdminController@getPackageform')->middleware('admin');
    Route::get('/packageform/{packages}/packageedit', 'AdminController@PackageEdit')->middleware('admin');
    Route::post('/packageform', 'AdminController@postCreatePackage')->middleware('admin');
    Route::patch('/packageform/{packages}', 'AdminController@PackageUpdate')->middleware('admin');
//End Admin Routes//////////////////////////////////////////////////////////////////////


//User - Family Routes//////////////////////////////////////////////////////////////////
   Route::get('/users', 'AdminController@getusers')->middleware('admin');
   Route::get('/users/{families}', 'AdminController@showfamily')->middleware('auth');
   Route::get('/users/{families}/familyedit', 'AdminController@FamilyEdit')->middleware('admin');
   Route::post('/users', 'AdminController@storeUser')->middleware('admin');
   Route::post('/users/{families}/players', 'AdminController@storePlayer')->middleware('admin');
   Route::patch('/users/{families}', 'UserController@update')->middleware('admin');
//End User - Family Routes///////////////////////////////////////////////////////////////

//Players Routes/////////////////////////////////////////////////////////////////////////
    Route::get('players', 'AdminController@getPlayers')->middleware('admin');
    Route::get('/players/{players}', 'AdminController@playershow')->middleware('admin');
    Route::get('/players/{player}/playeredit', 'PlayerController@edit')->middleware('admin');
    Route::post('/players/{players}/lessonhours', 'AdminController@storeLessonHours')->middleware('admin');
    Route::patch('/players/{player}', 'PlayerController@update')->middleware('admin');
//End Players Routes/////////////////////////////////////////////////////////////////////

//Lessonhours Routes/////////////////////////////////////////////////////////////////////
    Route::get('/lessonhours/', 'AdminController@getLessonHours')->middleware('admin');
    Route::get('/lessonhours/{lessonhours}', 'AdminController@Lessonhoursshow')->middleware('admin');
    Route::get('/lessonhours/{lessonhours}/lessonhoursedit', 'AdminController@LessonhoursEdit')->middleware('admin');
    Route::post('/lessonhours/{lessonhours}/hoursused', 'AdminController@storeHoursused')->middleware('admin');
    Route::patch('/lessonhours/{lessonhours}', 'AdminController@LessonhoursUpdate')->middleware('admin');
//End Lessonhours Routes

//Hoursused Routes/////////////////////////////////////////////////////////////////////
    Route::get('/hoursused/{hoursused}/hoursusededit', 'AdminController@HoursusedEdit')->middleware('admin');
    Route::patch('/hoursused/{hoursused}', 'AdminController@HoursusedUpdate')->middleware('admin');
//End Hoursused Routes//////////////////////////////////////////////////////////////////

//Accounts Routes/////////////////////////////////////////////////////////////////////////
    Route::get('/mylessonhours', 'PlayerController@getMyLessonhours')->middleware('auth');
    Route::get('/mylessonhours/{lessonhours}', 'PlayerController@getMyHoursused')->middleware('auth');
    Route::get('/myfamilyprofile', 'UserController@getMyFamilyProfile')->middleware('auth');
    Route::post('/myfamilyprofile/{families}/players', 'UserController@storePlayer')->middleware('auth');
//End Accounts Routes//////////////////////////////////////////////////////////////////////

Route::group(['middleware' => ['web', 'auth']], function () {
      //Shopping Cart Routes/////////////////////////////////////////////////////////////////////////
    Route::get('/packages', [
        'uses' => 'FrontController@packages',
        'as' => 'packages'
        ]);
        
    Route::get('/package/{id}', [
        'uses' => 'FrontController@package',
        'as' => 'package'
        ]);
        
    Route::resource('/cart', 'CartController');
    Route::get('/cart/add-item/{id}',[ 
            'uses' => 'CartController@addItem',
            'as' => 'cart.addItem']);
     
    Route::get('payment','CheckoutController@payment')->name('checkout.payment');
    Route::post('store-payment','CheckoutController@storePayment')->name('payment.store');
    Route::get('/front/paymentthanks', [
                'uses' => 'CheckoutController@paymentThanks',
                'as' => 'paymentthanks'
                ]);



//End Shopping Cart Routes//////////////////////////////////////////////////////////////////////
});