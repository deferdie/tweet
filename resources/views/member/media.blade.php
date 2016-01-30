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
  <div class="col-md-1 iCon" data-imd="{{$image->id}}">
   <div class="img-op">
     <i class="halflings-icon white trash im"></i>
   </div>
    <img width="200" src="{{$image->imagePath}}/{{$image->imageName}}" alt="{{$image->imageName}}" data-image="{{$image->imageName}}">
  </div>
@endforeach
</div>


@endsection
