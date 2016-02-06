<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
  //Return Client Name
  public static function clientName($clientID){
    $clientName = Clients::Find(25);
    return $clientName->clientName;
  }
}
