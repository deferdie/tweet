@extends('master-back')


@section('content')
<div class="row-fluid">
  <div class="col-md-12">
    <p>These notifications will be deleted after 30 days</p>
    @foreach($notifacations as $notifacation)
      <p><i class="{{$notifacation->icon}}"></i> {{$notifacation->message}}</p>
    @endforeach
  </div>
</div>
@endsection
