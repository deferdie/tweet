@extends('master-back')
@section('content')
       <h1>Create Client</h1>
  			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Create Client</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="/create-client">
                          {!! csrf_field() !!}
						  <fieldset>
                            <div class="control-group">
							  <label class="control-label" for="clientName">Client Name</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="clientName" placeholder="Client Name" required />
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Create</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection
