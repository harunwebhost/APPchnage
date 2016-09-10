

<div id="newdistricusers" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create New User Login</h4>
      </div>
      <div class="modal-body">

			<form role="form" action="newlogin.php" method="POST">
				<input type="hidden" name="table_name" value="userslists">
				<div class="col-md-12">
					<div class="col-md-6">
					<div class="form-group">
					<label>Name</label>
					<input class="form-control" placeholder="Name" name="field[name]" required="">
					</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
					<label>Email</label>
					<input class="form-control" placeholder="Email"  name="field[email_address]" required="">
					</div>
					</div>
				</div>
				
				<div class="col-md-12">
					<div class="col-md-6">
					<div class="form-group">
					<label>Mobile</label>
					<input class="form-control" placeholder="Mobile" name="field[mobile_number]" required="">
					</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
                              <label>Distric</label>
                              <select class="form-control" name="field[district_id]" id="district_name">
                              <?php distric_list(''); ?>
                              </select>
                           </div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
                              <label>Select User Type</label>
                              <select class="form-control" name="field[user_type]" id="district_name">
                              <?php userslist(''); ?>
                              </select>
                           </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
                              <label>Select Campaign</label>
                              <select class="form-control" name="field[campaign_id]" id="district_name">
                              <?php campaings(''); ?>
                              </select>
                           </div>
					</div>
				</div>
						
						<?php require_once('hidden_values.php'); ?>
					
						<div class="col-md-10 col-md-offset-4">
						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Create" name="Create">
							</div>
								</form>
							</div>
								
				</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>