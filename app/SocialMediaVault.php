<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMediaVault extends Model
{
  public static function twitterName($userID){
    $SocialMediaVault = SocialMediaVault::find($userID);
    return $SocialMediaVault->twitterName;
  }

  public function deleteSocialMediaAccount($userID){
    $socialMediaToDelete = SocialMediaVault::destroy($userID);
    echo 'Removed';
  }

}
