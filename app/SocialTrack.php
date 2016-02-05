<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialTrack extends Model
{

  public function addTwitterToAccount($userID){
    $add = new SocialTrack();
    $add->userID = $userID;
    $add->twitter = 1;
    $add->save();
  }

}
