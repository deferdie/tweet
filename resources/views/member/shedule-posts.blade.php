@extends('master-back')
@section('content')

  <div class="row-fluid">
    <div class="span12">
      <div class="showOptions">
        <a href="create-shedule-tweet">
         <div class="post-block">
           CREATE TWEET
         </div>
        </a>
         <div class="post-block">
           CREATE POST
         </div>
      </div>
    </div>
  </div>

    <div class="row-fluid">
      <div class="box span12">
          <div class="box-header" data-original-title>
              <h2><i class="halflings-icon white user"></i><span class="break"></span>Clients</h2>

          </div>
          <div class="box-content">
              <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Social Name</th>
                        <th>Platform</th>
                        <th>Departure Time</th>
                        <th>Departure Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

              @foreach($posts as $post)
                  <tr id="row-client-{{$post->id}}">

                      <td>{{ App\Clients::clientName($post->clientID) }}</td>
                      <td class="center"> <a href="http://twitter.com/{{App\SocialMediaVault::twitterName($post->userID)}}" target="_blank">{{App\SocialMediaVault::twitterName($post->userID)}}</a></td>
                      <td class="center">
                        @if($post->platform == 0)
                          <img class="postIco" src="<?=asset('theme/img/tw.png')?>" alt="Twitter Post" />
                        @endif
                      </td>
                      <td class="center">
                        {{$post->time}}
                      </td>
                       <td class="center">
                        {{$post->date}}
                      </td>
                      <td class="center">

                         @if($post->status == 0)
                          <span class="label label-success">Sent</span>
                         @else
                         <span class="label label-fail">Waiting</span>
                         @endif
                      </td>
                      <td class="center">
                          <a class="btn btn-success inf" href="#" data-href="{{ $post->id }}">
                              <i class="halflings-icon white zoom-in"></i>
                          </a>
                          <a class="btn btn-info @if($post->status == 1)enabled @else disabled @endif" href="#" data-href="{{ $post->id }}">
                              <i class="halflings-icon white edit"></i>
                          </a>
                          <a class="btn btn-danger" id="{{ $post->id }}" href="{{ $post->id }}">
                              <i class="halflings-icon white trash"></i>
                          </a>
                      </td>
                  </tr>
                @endforeach
                </tbody>
            </table>
          </div>
      </div><!--/span-->

    </div><!--/row-->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Post Message</h4>
      </div>
      <div class="modal-body">
        <p class="updateText">Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

 <div id="myModalEdit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Message</h4>
      </div>
      <div class="modal-body">
        <textarea class="updateTextEdit"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Update</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript" src="<?=asset('theme/js/posts.js')?>"></script>
<script type="text/javascript">

  $('.inf').click(function(){
    var href = $(this).attr('data-href');
    var ans = getPostContent(href, $('meta[name="csrf-token"]').attr('content'));
    return false;
  });

  $('.btn-danger').click(function(){
    var href = $(this).attr('href');
    deletePost(href,$('meta[name="csrf-token"]').attr('content'));
    return false;
  });

  $('.enabled').click(function(){
    var href = $(this).attr('data-href');
    editPost(href,$('meta[name="csrf-token"]').attr('content'));
    return false;
  });

</script>
@endsection
