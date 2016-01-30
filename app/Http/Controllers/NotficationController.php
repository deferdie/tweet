<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class NotficationController extends Controller
{

  public function clearNotifications(){
    $userID = Auth::User()->id;
    DB::table('notifacations')
    ->where('userID', $userID)
    ->update(['active' => '0']);
  }

  public function showNotifacations(){
    return DB::table('notifacations')->where('userID', Auth::User()->id)->where('active', '1')->get();
  }

  public function getNotificationCount(){
    return DB::table('notifacations')->where('userID', Auth::User()->id)->where('active', '1')->count();
  }

  public function getSeenNotifications(){
    return DB::table('notifacations')->where('userID', Auth::User()->id)->get();
  }

  public function notiView(){
    return view('member.notifications', ['notifacations' => $this->getSeenNotifications(), 'title' => 'Your Notification']);
  }

}
