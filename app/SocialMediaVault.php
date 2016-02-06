<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMediaVault extends Model
{
  public static function twitterName($userID){
    $SocialMediaVault = SocialMediaVault::find(1);
    return $SocialMediaVault->twitterName;
  }

  public function deleteSocialMediaAccount($clientID){
    $socialMediaToDelete = SocialMediaVault::where('clientID', $clientID)->delete();
    echo 'Removed';
  }

}
