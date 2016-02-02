@extends('master-back')
@section('content')


  			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Create Twitter Shedule</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="/create-shedule-tweet" id="sTweet">
                          {!! csrf_field() !!}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Search Client</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="client" data-provide="typeahead" data-items="4"
data-source='[<?php foreach($clients as $clientName){?>"<?=$clientName->clientName ?>", <?php } ?>" "]' placeholder="Type to search">
							  </div>
							</div>
												<div class="control-group">
							  <label class="control-label" for="date01">Date</label>
							  <div class="controls">
								<input type="text" name="date" class="input-xlarge dp" id="datepicker" placeholder="Select Date">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="date02">Time</label>
							  <div class="controls clockpicker">
								<input type="text" id="single-input" class="form-control" name="time" placeholder="Enter time. EG 21:40" />
								<span class="input-group-addon">
                                  <span class="glyphicon glyphicon-time"></span>
                                </span>
							  </div>

							</div>
                            <div class="control-group">
							  <label class="control-label" for="date03">Select Time Zone</label>
							  <div class="controls">
								<select name="timeZone">
								  <option selected>Europe/London</option>
								</select>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">Select Image</label>
							  <div class="controls">
								<div class="btn" data-toggle="modal" id="upImg">Select Images</div>

							  </div>
							</div>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Tweet</label>
							  <div class="controls">
								<textarea class="cleditord" name="tweetMessage" id="textarea2s" rows="3" placeholder="Enter your Tweet"></textarea>
							  </div>
							</div>
							<div class="form-actions">
                              <input type="hidden" id="imgs" value="" name="img" />
							  <button type="submit" class="btn btn-primary" id="cTe">Shedule Post</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript" src="<?=asset('theme/clock/dist/bootstrap-clockpicker.min.js')?>"></script>

<!-- Modal -->
<div id="upImgs" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Images</h4>
      </div>
      <div class="modal-body">
       <div id="disImg"></div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection
