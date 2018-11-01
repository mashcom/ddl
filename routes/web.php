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

Route::get('/', function () {

    return redirect('login');
});


Route::group(['middleware' => ['auth']], function () {
    Route::resource('licence', 'LicenceController');
    Route::get('licence/delete/{id}', 'LicenceController@destroy');
    Route::get('qr', 'LicenceController@qr');
    Route::post('qr', 'LicenceController@generateQr');
    Route::get('log','LicenceController@getLogs');
});

Route::get('reset/pwd/{licence_no}', 'HomeController@accountExists');
Route::get('verify/token/{licence_no}/{token}', 'HomeController@verifyToken');
Route::get('save/password/{licence_no}/{password}', 'HomeController@savePassword');
Route::get('notify/{id}/{auth_code}', function ($id, $auth_code) {

    $user = \App\Licence::find($id);
    if (\App\Qr::orderBy('id', 'desc')->first()->code != $auth_code) {
        $message = "Invalid QR user with id $id and name $user->name with auth code $auth_code";
        \App\Log::create(['details'=>$message,'user_id'=>$id,'status'=>"failed"]);

        return response()->json(['status' => 'access_denied']);
    }


    $message = "Verified user with id $id and name $user->name with auth code $auth_code";
    \App\Log::create(['details'=>$message,'user_id'=>$id,'status'=>'success']);

    //Remember to change this with your cluster name.
    $options = array(
        'cluster' => 'us2',
        'encrypted' => true
    );

    //Remember to set your credentials below.
    $pusher = new Pusher\Pusher(
        '8b28618c2c33294ac33e',
        'fc73e9ce254e53aee8f6',
        '623321',
        $options
    );

    //Send a message to notify channel with an event name of notify-event
    $pusher->trigger('my-channel', 'my-event', $id);
    return response()->json(['status' => 'success']);
});


Auth::routes();

Route::get('/home', function () {
    return redirect('licence');
})->name('home');

Auth::routes();


Route::get('admin/login', 'Auth\LoginController@adminLogin');
