<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

  public function storeImage($userID, $imageName, $imagePath){
    $storeImg = new Image();
    $storeImg->userID = $userID;
    $storeImg->imageName = $imageName;
    $storeImg->imagePath = $imagePath;
    $storeImg->save();
  }
}
