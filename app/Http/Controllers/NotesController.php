<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Notes;
use Auth;

class NotesController extends Controller
{

  protected $userID;
  protected $user;

  function __construct(){
    $user = Auth::user();
    $this->user = $user;
    $this->userID = $user->id;
  }

  public function index(){
    return view('member.notes', ['notes' => $this->user->notes]);
  }

  public function createNote(){
    return view('member.forms.createNote');
  }

  // Function to create a note
  public function create(Request $request)
  {
    $saveNote = new Notes;
    $saveNote->title = $request->input('note-title');
    $saveNote->userID = $this->userID;
    $saveNote->note = $request->input('note-message');
    $saveNote->save();
    return redirect('/notes');
  }

  /**
  * Description for getNote
  * This will return a json to the view
  * @public
  */

  public function getNote($id){
    $note = Notes::find($id);
    return $note;
  }

  public function edit()
  {
    $note = Notes::find($_POST['utd']);
    $note->title = $_POST['title'];
    $note->note = $_POST['note'];
    $note->save();
    echo "Saved";
  }

  //Function to delete a note
  public function destroy($id)
  {
    $note = Notes::destroy($id);
    echo "Deleted";
  }
}
