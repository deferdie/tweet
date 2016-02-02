<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use DB;
use Auth;
use Log;
class tweetController extends Controller
{

    public function createTweet()
    {
      $user = Auth::user();
      $memberID = $user->id;

      if(isset($_POST['client'])){

        // GET the post variables
        $clientName   = $_POST['client'];
        //Get the client ID from the post variable
        $postDate     = $_POST['date'];
        $postTime     = $_POST['time'];
        $timeZone     = $_POST['timeZone'];
        $tweetMessage = $_POST['tweetMessage'];
		  if(is_null($_POST['img']) || strlen ( $_POST['img']) == 0 ){

            $image = 0;
            $im = false;
            $message = "Tweet created";
		  }else{
            //var_dump($_POST['img']);
            $img = $_POST['img'];
            $im = true;
            $image = 1;
            $message = "Tweet Created with image";

		  }


        //Check if all fields are filled in

        if( ($clientName !== '') || ($postDate !== '') || ($postTime !== '') || ($timeZone !== '') || ($tweetMessage !== '') ){

         //Check if string contains more than the twitter limit

          if(strlen($tweetMessage) > 140){
            return "Please your tweet length is grater than 140 characters";
            die();
          }

        $clienID = DB::table('clients')->where('clientName', $clientName)->where('userID', $memberID)->first();
        $clienID = $clienID->id;
        //check tweet message length. NEED TO COMPLETE THIS.
        // save the tweet
        //Insert into DB
          $savePost = new Post();
          $savePost->clientID = $clienID;
          $savePost->userID = $memberID;
          $savePost->timeZone = $timeZone;
          $savePost->time = $postTime;
          $savePost->date = $postDate;
          $savePost->message = $tweetMessage;
          $savePost->status = 1;
          $savePost->platform = 0;
          $savePost->image = $image;
          $savePost->save();


        if($im == true){
          $imgs = json_decode($img);
            foreach ($imgs as $imageID){
               DB::table('imagesToSends')->insert(
                [
                  'userID' => $memberID, //GET CLEINT ID
                  'postID' => $savePost->id,
                  'imageID' => $imageID
                ]
              );
            }
        }


        echo $message;
        }
      }else{
        echo "Please fill in all mandatory fields.";
      }
    }

    //METHOD TO RETURN POST MESASGE by id

  public function getPostMessage()
  {
    $postID = $_GET['postID'];
    return DB::table('posts')->where('id', $postID)->value('message');
  }

  public function destroy()
  {
    $postID = $_POST['postID'];
    $user = Auth::user();
    $memberID = $user->id;
      //FUNCTION TO DELETE A POST
    DB::table('posts')->where('id', $postID)->where("userID" , $memberID)->delete();
    //Delete all images to send if any
    DB::table('imagesToSends')->where('postID', $postID)->delete();
    echo "Post is now deleted";
  }

  //EDIT POST

  public function editPost()
  {
    $postID = $_POST['postID'];
    return DB::table('posts')->where('id', $postID)->value('message');
  }

  public function editPostMessage()
  {
    $mes = $_POST['mes'];
    $mesID = $_POST['medi'];
    $savePost = Post::find($mesID);
    $savePost->message = $mes;
    $savePost->save();
    echo "Saved";
  }

}
