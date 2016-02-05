<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
  return view('welcome');
});

Route::get('/contact-us', function () {
  return view('contact', ['title' => "Contact Us"]);
});

Route::get('/sign-up', function () {
  return view('register', ['title' => "Sign-up"]);
});

// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::post('member', 'Auth\AuthController@postLogin');
Route::post('/', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::get('become-member', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


  Route::group(['middleware' => 'auth'], function () {


    Route::get('/home', function(){
      $user = Auth::user();
      $userID = $user->id;
      //Get the current count of posts sent in total.
      $totalPostCount = DB::table('userStats')->where('userID', $userID)->first();
      return view('member.home', [
        'post' => $totalPostCount,
        'title' => "Your Dashboard"
      ]);
    });


    Route::get('user/profile', function(){
      return view('member.profile', ['title' => "Your Profile"]);
    });

    Route::get('clients', function(){
      $user = Auth::user();
      $userID = $user->id;
      $clients = DB::table('clients')->where('userID', $userID)->orderBy('clientName', 'asc')->paginate(6);
          $clients->setPath('\clients');
          return view('member.clients', [
            'clients' => $clients,
            'title' => "Your Clients"
          ]);
      });

    Route::get('shedule-posts', function(){
      $user = Auth::user();
      $userID = $user->id;
      $clients = DB::table('posts')->where('userID', $userID)->orderBy('id', 'asc')->get();
        return view('member.shedule-posts', [
          'posts' => $clients,
          'title' => "Shedule Posts"
        ]);
    });

    Route::get('user/create/client', function(){
      $user = Auth::user();
      $userID = $user->id;
          return view('member.forms.createClient', [
            'title' => "Create Client"
          ]);
      });

    Route::get('media', ['as' => 'media', function(){
      $user = Auth::user();
      $userID = $user->id;
      $images = DB::table('images')->where('userID', $userID)->get();
          return view('member.media', [
            'title' => "Your Media",
            'images' => $images
          ]);
      }]);

    Route::get('/calendar', function(){
      return view('member.calender');
    });

    //POSTS ROUTES START
    Route::post('/create-client', 'clientController@createClient');
    Route::post('/user/delete/client', 'clientController@destroyClient');
    Route::post('/user/edit/client', 'clientController@editClient');

    //Post routs for adding social media accounts
    Route::get('/twitter/auth/', 'twitterOauth@index');
    Route::get('/twitter/auth/callback', 'twitterOauth@twitterCallbackSignIn');

    //SHEDULE ROUTES
    Route::get('create-shedule-tweet', function(){
      $user = Auth::user();
      $userID = $user->id;
      $clients = DB::table('clients')->where('userID', $userID)->orderBy('id', 'asc')->paginate(6);
      return view('member.shedule-tweet', [
        "clients" => $clients
      ]);
    });

    Route::post('create-shedule-tweet', 'tweetController@createTweet');

    //Routes for editing posts
    Route::post('delete-shedule-post', 'tweetController@destroy');
    Route::get('get-post-message', 'tweetController@getPostMessage');
    Route::post('edit-shedule-post', 'tweetController@editPost');
    Route::post('edit-shedule-message', 'tweetController@editPostMessage');

    //NotficationController ROUTES
    Route::get('view-notifications', 'NotficationController@notiView');
    Route::get('clearnoti', 'NotficationController@clearNotifications');
    Route::get('showNotifacations', 'NotficationController@showNotifacations');
    Route::get('getNotificationCount', 'NotficationController@getNotificationCount');

    Route::any('form-submit', 'fileManagerController@uploadImage');
    //Get user images;
    Route::get('user-images', 'fileManagerController@getImages');
    //Delete user Image
    Route::post('deleteImage', 'fileManagerController@deleteImage');

    //Routes for Shedule
    Route::get('/usr/cal/get-posts-json', 'tweetController@getPostsJson');

    //Routes for profile and settings

    Route::get('user/settings/manage-accounts', function(){
      return view('member.sub.accounts');
    });

});

 Route::get('/sendCronJobs', 'tweetController@sendCronJobs');
 Route::any('/test2', 'twitterOauth@test2');
//callback URLS
Route::any('test', [
    'as' => 'test', 'uses' => 'twitterOauth@test'
]);
