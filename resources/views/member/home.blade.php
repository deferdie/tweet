@extends('master-back')

@section('content')
<div class="row-fluid">
  <div class="col-md-1">
    <div class="showBox red">
      <div class="showBoxTitle">POST SENT</div>
      <div class="showBoxResult"> @if($post == null) 0 @else{{$post->postSent}}@endif</div>
    </div>
  </div>
  <div class="col-md-1">
    <div class="showBox twitterBlue">
      <div class="showBoxTitle">TWEETS SENT</div>
      <div class="showBoxResult">@if($post == null) 0 @else{{$post->twitterPostsSent}}@endif</div>
    </div>
  </div>
</div>

@endsection
