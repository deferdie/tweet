<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Auth;
use File;
use App\Image;
use Storage;

class fileManagerController extends Controller
{

  public function uploadImage(){
	  $fileName = Input::file('file')->getClientOriginalName();
	  $imageSize = Input::file('file')->getClientSize();
	  $user = Auth::User();
	  $userID = $user->id;
	  $storeImage = new Image;
	  $dir = 'storage/'.$userID;
	  $storeImage->storeImage($userID, strtolower($fileName), $dir);
	  //Save the fileManagerController
	  Input::file('file')->move('storage/'.$userID,strtolower(Input::file('file')->getClientOriginalName()));
    //Redirect bcak to media view
	  return redirect()->route('media');
  }

  public function getImages(){
    $user = Auth::User();
    $userID = $user->id;
    $getImages = Image::where('userID', $userID)->get();
    return $getImages;
  }

  public function deleteImage(){
    $user = Auth::User();
    $userID = $user->id;
    $image = Image::find($_POST['imageID']);
    Storage::delete("$userID/$image->imageName");
    Image::destroy($_POST['imageID']);
    return "Image Deleted!";
  }


}
