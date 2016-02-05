@extends('master-back')
@section('content')

  <div class="row-fluid">
    <div class="span12">
      <div class="showOptions">
        <a href="create-sub-user">
         <div class="post-block">
           Create User
         </div>
        </a>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                  <tr id="row-client-">

                      <td>James</td>
                      <td class="center">jameshoogan@gmail.com</td>
                      <td class="center">1</td>
                      <td class="center">
                          <a class="btn btn-success inf" href="#" data-href="">
                              <i class="halflings-icon white zoom-in"></i>
                          </a>
                          <a class="btn btn-info" href="#" data-href="">
                              <i class="halflings-icon white edit"></i>
                          </a>
                          <a class="btn btn-danger" id="" href="">
                              <i class="halflings-icon white trash"></i>
                          </a>
                      </td>
                  </tr>
                </tbody>
            </table>
          </div>
      </div><!--/span-->

    </div><!--/row-->

@endsection
