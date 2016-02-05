<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Auth;
use DB;
use Log;
use App\SocialMediaVault;
use App\SocialTrack;
class twitterOauth extends Controller
{

  protected $client;
  //protected $clientCallBack = "http://tweet.app/twitter/auth/callback";
  protected $clientCallBack = "http://tweetamatic.co.uk/twitter/auth/callback";
  protected $oauthToken;
  protected $oauthSecret;

  public function __construct(){
    #First param = Public key
    #Second param = private key
    \Codebird\Codebird::setConsumerKey('jtB9eFeOc1iHYN08GIXuZIZtx','09JZMkC0y55Czp0GRUnYufqka1zorPVFiyqdhVqAtWzApoNsof');
    $twitterClient = \Codebird\Codebird::getInstance();
    $this->client = $twitterClient;
  }

  public function index(){
    //var_dump($this->client);
    $oauthUrl =  $this->getAuthUrl();
    $clientID =  $_GET['clientID'];

    Session::put('clientID', $clientID);
    return view('addmedia.twitter', [
      'oauth' => $oauthUrl
    ]);

  }

  public function getAuthUrl(){
    $this->requestTokens();
    $this->verifyTokens();
    return $this->client->oauth_authenticate();
  }

  protected function requestTokens(){
    $reply = $this->client->oauth_requestToken([
      'oauth_callback' => $this->clientCallBack
    ]);
    //var_dump($reply);
    //$this->oauthToken = $reply->oauth_token;
    //$this->oauthSecret = $reply->oauth_token_secret;
    $this->storeToken($reply->oauth_token, $reply->oauth_token_secret);
  }

  protected function verifyTokens(){
    $this->client->setToken(Session::get('oauth_token'), Session::get('oauth_token_secret'));
  }

  protected function storeToken($token, $tokenSecret){
    Session::put('oauth_token', $token);
    Session::put('oauth_token_secret', $tokenSecret);
  }

  public function twitterCallbackSignIn(){
    if($this->hasCallback()){
      $this->verifyTokens();
      $reply = $this->client->oauth_accessToken([
        'oauth_verifier' => $_GET['oauth_verifier']
      ]);

      if($reply->httpstatus === 200){
        //$this->storeToken($reply->oauth_token, $reply->oauth_token_secret);
        # Store in databasse
        $userID = Auth::User();
        $clientID = Session::get('clientID');
        DB::table('twitterOAuth')->insert(
            [
              'userID' => $userID->id,
              'clientID' => $clientID,
              'oauth_token' => $reply->oauth_token,
              'oauth_token_secret' => $reply->oauth_token_secret
            ]
        );
        //Insert Twitter Name

        $sm = new SocialMediaVault();
        $sm->userID = $userID->id;
        $sm->clientID = $clientID;
        $sm->twitterName = $reply->screen_name;
        $sm->twitterID = $reply->user_id;
        $sm->save();

        $addtw = new SocialTrack();
        $addtw->addTwitterToAccount($userID->id);

        header('Location: /home');
      }
      header('Location: /home');
      return '';
    }
    return '';
  }

  protected function hasCallback(){
    return isset($_GET['oauth_verifier']);
  }

  public function sendTweetWithMedia($publicAuth, $authSecret, $message, $postID, $userID){
    \Codebird\Codebird::setConsumerKey('jtB9eFeOc1iHYN08GIXuZIZtx','09JZMkC0y55Czp0GRUnYufqka1zorPVFiyqdhVqAtWzApoNsof');
    $twitterClient = \Codebird\Codebird::getInstance();
    $twitterClient->setToken($publicAuth, $authSecret);
    //Media to upload.
    //get images
    $images = DB::table('imagesToSends')->where('postID', $postID)->get();
    $media_files = [];
    foreach($images as $image){
      $imagePaths = DB::table('images')->where('id', $image->imageID)->get();
      foreach($imagePaths as $path){
        //array_push($media_files, "/home/vagrant/Code/Laravel/public/storage/$userID/$path->imageName");
        array_push($media_files, "/home/forge/tweetamatic.co.uk/public/storage/$userID/$path->imageName");
      }
    }

    /*
    WORKING EXAMPLE
    $media_files = [
      '/home/vagrant/Code/Laravel/public/storage/1/dsc_0003.jpg', '/home/vagrant/Code/Laravel/public/storage/1/dsc_0007.jpg', '/home/vagrant/Code/Laravel/public/storage/1/dsc_0003.jpg'
    ]*/;

    $media_ids = [];
    Log::info("Logging an array: " . print_r($media_files, true));
    foreach ($media_files as $file) {
      $reply = $twitterClient->media_upload(['media' => $file]);
      Log::info("Logging an array: " . print_r($reply, true));
      $media_ids[] = $reply->media_id_string;
    }
    $media_ids = implode(',', $media_ids);

    // send Tweet with these medias
    $reply = $twitterClient->statuses_update([
      'status' => $message,
      'media_ids' => $media_ids
    ]);


  }

  public function sendTweet($publicAuth, $authSecret, $message){
    \Codebird\Codebird::setConsumerKey('jtB9eFeOc1iHYN08GIXuZIZtx','09JZMkC0y55Czp0GRUnYufqka1zorPVFiyqdhVqAtWzApoNsof');
    $twitterClient = \Codebird\Codebird::getInstance();
    $twitterClient->setToken($publicAuth, $authSecret);
    $params = array('status' => $message);
      //Send the Tweet
    $reply = $twitterClient->statuses_update($params);


  }

}
