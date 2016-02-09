@extends('master-back')


@section('content')
<div class="row-fluid">
 <a href="note/create">
  <button class="btn btn-default">New Note</button>
  </a>
</div>

<br />
  @foreach($notes->chunk(12) as $noteItems)
    <div class="row-fluid">
       @foreach($noteItems as $noteView)
        <div class="col-md-1 note note-{{$noteView->id}}" data-nod="{{$noteView->id}}">
          <p><b>{{$noteView->title}}</b></p>
          <a class="del-not" href="#" data-nod="{{$noteView->id}}">Delete</a>
        </div>
      @endforeach
    </div>

  @endforeach

<!-- Modal -->
<div id="modalNote" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default" id="utd">Update</button>
      </div>
    </div>

  </div>
</div>
@endsection
