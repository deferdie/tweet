<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Auth;
use File;
use App\Image;

class fileManagerController extends Controller
{
 public function uploadImage(){
   $fileName = Input::file('file')->getClientOriginalName();
   $imageSize = Input::file('file')->getClientSize();
   $user = Auth::User();
   $userID = $user->id;
   $storeImage = new Image;
   $dir = 'storage/'.$userID;
   $storeImage->storeImage($userID, $fileName, $dir);

   //Save the fileManagerController
   Input::file('file')->move('storage/'.$userID,Input::file('file')->getClientOriginalName());


  }

}
