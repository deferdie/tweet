@extends('master-back')
@section('content')
       <h1>Create Client</h1>
  			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Create Note</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="create">
                          {!! csrf_field() !!}
						  <fieldset>
                            <div class="control-group">
							  <label class="control-label" for="clientName">Title</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="note-title" placeholder="Name your note" required />
							  </div>
							</div>
                          <div class="control-group">
							  <label class="control-label" for="clientName">Note</label>
							  <div class="controls">
								<textarea class="span6 typeahead" name="note-message" placeholder="Type your note" required></textarea>
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection
