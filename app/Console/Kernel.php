<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Log;
use DB;
use App\Http\Controllers;
use App\Http\Controllers\twitterOauth;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
      $posts = DB::table('posts')->where('status', '1')->get();
      foreach($posts as $post){
        $postID = $post->id;
        $clientID = $post->clientID;
        $userID = $post->userID;
        $clientTimeZone = $post->timeZone;
        $message = $post->message;
        $postDate = $post->date;
        $postTime = $post->time;
        $imageExists = $post->image;

         $oauth = DB::table('twitterOAuth')->where('clientID', $clientID)->get();

        foreach($oauth as $auth){
          $publicAuth = $auth->oauth_token;
          $authSecret = $auth->oauth_token_secret;
        date_default_timezone_set($clientTimeZone);
          $time = date('H:i', time());
          $date = date("d-m-Y");
          $st = new twitterOauth();
          if($date == $postDate){
            if($time == $postTime){
              if($imageExists == 0){
                $st->sendTweet($publicAuth, $authSecret, $message);
              }else{
                Log::info('getting sent');
                $st->sendTweetWithMedia($publicAuth, $authSecret, $message, $postID, $userID);
                Log::info('sent');
              }

              /*
68
              $status = $reply->httpstatus;
69
70
              if($status == 200) {
71
72
                // mark topic as tweeted (ensure that it will be tweeted only once)
73
                Log::info('Sent Twitter In media');
74
                }else {
75
                $twitterClient->setReturnFormat(CODEBIRD_RETURNFORMAT_ARRAY);
76
77
                foreach($reply as $re){
78
                Log::info($re);
79
                }
80
*/
              DB::table('posts')->where('id', $postID)->update(['status' => 0]);
              //Log::info('Sent Twitter ' . $postID);
              $addCount = DB::table('userStats')->where('userID', $userID)->first();
              if(is_null($addCount)){
                //Does not exist, Insert
                DB::table('userStats')->insert(
                  ['userID' => $userID, 'postSent' => 1, 'twitterPostsSent' => 1]
                );
              }else{
                //Exists Increments
                DB::table('userStats')->where('userID', $userID)->increment('postSent');
                DB::table('userStats')->where('userID', $userID)->increment('twitterPostsSent');

              }

              }

            }

          }

        }

    }

}


