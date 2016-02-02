@extends('master-back')
@section('content')
<form method="POST" action="http://tweet.app/form-submit" accept-charset="UTF-8" enctype="multipart/form-data">
  {!! csrf_field() !!}
  <input name="file" type="file" id="file">
  <input type="submit" value="Save">
  <input type="reset" value="Reset">
</form>
<div class="row-flud">
@foreach($images as $image)
  <div class="col-md-1 iCon" data-imd="{{$image->id}}" id="{{$image->id}}mediaImage">
   <div class="img-op data-del" data-del="{{$image->id}}">
     <i class="halflings-icon white trash im"></i>
   </div>
    <img width="200" src="{{$image->imagePath}}/{{$image->imageName}}" alt="{{$image->imageName}}" data-image="{{$image->imageName}}">
  </div>
@endforeach
</div>

<div id="myModalEdit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        <textarea class="updateTextEdit"></textarea>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default danger" data-dismiss="modal">Delete</button>
      </div>
    </div>

  </div>
</div>
@endsection
