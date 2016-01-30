<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Auth;
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

        //Check if all fields are filled in

        if( ($clientName !== '') || ($postDate !== '') || ($postTime !== '') || ($timeZone !== '') || ($tweetMessage !== '') ){

         //Check if string contains more than the twitter limit

          if(strlen($tweetMessage) > 140){
            return "Please your tweet length is grater than 140 characters";
          }

        $clienID = DB::table('clients')->where('clientName', $clientName)->where('userID', $memberID)->first();
        $clienID = $clienID->id;
        //check tweet message length. NEED TO COMPLETE THIS.
        // save the tweet
        //Insert into DB
        DB::table('posts')->insert(
            [
              'clientID' => $clienID, //GET CLEINT ID
              'userID' => $memberID,
              'timeZone' => $timeZone,
              'time' => $postTime,
              'date' => $postDate,
              'message' => $tweetMessage,
              'status' => '1',
              'platform' => '0'
            ]
        );

        echo "Shedule Tweet Created!";
        }
      }else{
        echo "Please fill in all mandatory fields.";
      }
    }

    //METHOD TO RETURN POST MESASGE by id

    public function getPostMessage(){
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
      echo "Post is now deleted";
    }

  //EDIT POST

  public function editPost(){
    $postID = $_POST['postID'];
    return DB::table('posts')->where('id', $postID)->value('message');
  }

  public function sendCronJobs(){
    $posts = DB::table('posts')->where('status', '1')->get();

    foreach($posts as $post){
      $clientID = $post->clientID;
      //Get oAuth

      $oauth = DB::table('twitterOAuth')->where('clientID', $clientID)->get();

      foreach($oauth as $auth){

        $publicAuth = $auth->oauth_token;
        $authSecret = $auth->oauth_token_secret;
        \Codebird\Codebird::setConsumerKey('jtB9eFeOc1iHYN08GIXuZIZtx','09JZMkC0y55Czp0GRUnYufqka1zorPVFiyqdhVqAtWzApoNsof');
        $twitterClient = \Codebird\Codebird::getInstance();
        //Send the message
          $twitterClient->setToken($publicAuth, $authSecret);
          $params = array(
            'status' => 'Hello @veebowen'
          );
          $reply = $twitterClient->statuses_update($params);
      }

    }

  }



}
