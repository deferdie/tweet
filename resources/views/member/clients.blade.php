@extends('master-back')
@section('content')
 <div class="row-fluid">
  <a href="user/create/client">
   <div class="createClient">CREATE CLIENT</div>
  </a>
 </div>
  <div class="row-fluid sortable">
              <div class="box span12">
                      <div class="box-header" data-original-title>
                          <h2><i class="halflings-icon white user"></i><span class="break"></span>Clients</h2>

                      </div>
                      <div class="box-content">
                          <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Platform</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                          @foreach($clients as $client)
                              <tr id="row-client-{{$client->id}}">
                                  <td>{{ $client->clientName }}</td>
                                  <td>

                                  </td>
                                  <td class="center">
                                    <span class="label label-success">Active</span>
                                  </td>
                                  <td class="center">
                                      <a class="btn btn-success" data-toggle="modal" data-target="#viewClientModal" href="{{$client->id}}">
                                        <i class="halflings-icon white zoom-in"></i>
                                      </a>
                                      <a class="btn btn-info editClientModalLink" data-cl="{{$client->id}}" href="#" title="Edit Client">
                                          <i class="halflings-icon white edit"></i>
                                      </a>
                                      <a class="btn btn-danger" href="{{$client->id}}" title="Delete Client">
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
<div id="editClientModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit  <span id="cName"></span></h4>
      </div>
      <div class="modal-body" id="clientEApen">
        <div class="control-group">
          <label class="control-label" for="clientName">Client Name</label>
          <div class="controls">
            <input type="text" id="cname" placeholder="Client Name" name="clientName" value="" required/>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="clientName">Connect social account</label>
          <div class="controls">
            <a href="" id="clientTwitterAuth">
              <img src="<?=asset('theme/img/tw.png')?>" width="80" id="tw"  />
            </a>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <a href="#" id="deltw" data-cid="">
              Remove Twitter
            </a>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

 <div id="viewClientModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal View</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript" src="<?=asset('theme/js/posts.js')?>"></script>

<script type="text/javascript">
  $('.btn-danger').click(function(){
    var href = $(this).attr('href');
    deleteClient(href,$('meta[name="csrf-token"]').attr('content'));
    return false;
  });
</script>
<script type="text/javascript">
  $('.editClientModalLink').click(function(){
    var href = $(this).attr("data-cl")
    editClientModal(href, $('meta[name="csrf-token"]').attr('content'));
  });

  $('#deltw').click(function(){
    var href = $(this).attr("data-cid")
    removeSocialAccount(href, $('meta[name="csrf-token"]').attr('content'));
  });
</script>
 <script type="text/javascript">
  $('#tw').click(function(){
    //var href = $(this).attr("data-cl")
    addTwitter($('meta[name="csrf-token"]').attr('content'));

  });
</script>
@endsection



