<div id="newcampain" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Create New Campains</h4>
         </div>
         <div class="modal-body">
            <form role="form" action="insert_opration.php" method="POST">
               <input type="hidden" name="table_name" value="districts">
               <div class="col-md-12">
                  <div class="col-md-6">
                     <div class="form-group">
                        <br>
                        <label>Campaign Name</label>
                        <input class="form-control" placeholder="Name" name="field[campaign_name]" required="">
                     </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group"><br>
                           <label>Distric</label>
                           <select class="form-control" name="field[district_id]">
                              <?php distric_list(''); ?>
                           </select>
                        </div>
                  </div>
               </div>

			   <?php require_once('hidden_values.php'); ?>
            <input type="hidden" name="table_name" value="campaigns">
             <input type="hidden" name="page" value="campain_details.php?show=Cause">
             <input type="hidden" name="message" value="&message=New campain Created">

        	<div class="col-md-10 col-md-offset-4">
                  <div class="form-group">
                     <input type="submit" class="btn btn-primary" value="Create" name="Create">
                  </div>
            
            </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>