<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Clients;
use App\Notifacation;
use App\SocialMediaVault;
use Auth;
class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $SignedUserID;


    protected function userID()
    {
      return $this->SignedUserID = Auth::user()->id;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createClient()
    {
      $clientName = $_POST['clientName'];
      $clients = new Clients();
      $Notifacation = new Notifacation();
      $Notifacation->createClientNotifacation($this->userID());
      $clients->userID = $this->userID();
      $clients->clientName = $clientName;
      $clients->save();
      header('Location: /clients');

    }


      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyClient()
    {
      $clientToDelete = $_POST['clientID'];
      $clients = Clients::find($clientToDelete);
      $clients->delete();
      //Delete Twitter details
      App\SocialMediaVault::destroy($clientToDelete);
      App\twitterOAuth::destroy($clientToDelete);

      echo "Client Deleted!";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editClient()
    {
      //RETURNS A JSON OF THE CURRENT CLIENT REQUEST
      $clientToEdit = $_POST['clientID'];
      $client = Clients::find($clientToEdit);
      return $client->toJson();
    }

    public function removeSocialAccount(){
      $clientID = $_POST['clientID'];
      $removeSocialAccount = new SocialMediaVault();
      $removeSocialAccount->deleteSocialMediaAccount($clientID);
    }


}
