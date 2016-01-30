<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Log;
use DB;
use App\Http\Controllers;
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
        $postMedia = $post->image;
        //Get oAuth

        $oauth = DB::table('twitterOAuth')->where('clientID', $clientID)->get();

        foreach($oauth as $auth){

          $publicAuth = $auth->oauth_token;
          $authSecret = $auth->oauth_token_secret;
          \Codebird\Codebird::setConsumerKey('jtB9eFeOc1iHYN08GIXuZIZtx','09JZMkC0y55Czp0GRUnYufqka1zorPVFiyqdhVqAtWzApoNsof');
          $twitterClient = \Codebird\Codebird::getInstance();
          date_default_timezone_set($clientTimeZone);
          $time = date('H:i', time());
          $date = date("d-m-Y");

          if($date == $postDate){
            if($time == $postTime){
            //Send the message
            $twitterClient->setToken($publicAuth, $authSecret);

              if($postMedia == 0){
                $params = array(
                  'status' => $message
                );
                //Send the Tweet
                $reply = $twitterClient->statuses_update($params);
              }
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
