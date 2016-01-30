<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifacation extends Model
{
    public function createClientNotifacation($userID){
      $notification = new Notifacation();
      $notification->userID = $userID;
      $notification->active = '1';
      $notification->message = 'New client created';
      $notification->icon = 'icon-user';
      $notification->save();
    }
}
