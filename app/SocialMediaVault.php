<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMediaVault extends Model
{
  public static function twitterName($userID){
    $SocialMediaVault = SocialMediaVault::where('userID', $userID)->first();
    return $SocialMediaVault->twitterName;
  }

  public function deleteSocialMediaAccount($clientID){
    $socialMediaToDelete = SocialMediaVault::where('clientID', $clientID)->delete();
    echo 'Removed';
  }

}
