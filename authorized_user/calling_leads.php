<?php require_once('../webtemplate/headtags.php'); ?>
<?php require_once('../webtemplate/header_nav.php'); ?>
				<?php 
					/*get page header*/
					if(isset($_GET['show'])){
						$title=$_GET['show'];
					}else{
						$title="Total Leads";
					}
					if($title=="Calling"){
						  $get_lead="SELECT * FROM app_leads al,districts dis 
						 WHERE al.district_name=dis.district_id
						 AND 
						 al.district_name='$district_user_id'
						";
						 $campaign_name="";
					}
				 ?>
		
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo strtoupper($title); ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                     <form action="assingcalling.php" method="POST">
                      
                    <div class="panel panel-primary">
                            <div class="panel-heading">
                            <?php echo strtoupper($title); ?> 
                            <button class="btn btn-warning pull-right" type="submit" id="transfer">Transfer</button>
        					<div class="clearfix"></div>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						    <thead>
						    <tr>
						        <th data-field="state" data-checkbox="true" ></th>
						        <th data-field="lead_name" data-sortable="true">Name</th>
						        <th data-field="lead_email"  data-sortable="true">Email</th>
						        <th data-field="lead_mobile" data-sortable="true">Mobile</th>
						        <th data-field="lead_address" data-sortable="true">Address</th>
						        <th data-field="district_name" data-sortable="true">Distric Name</th>
						        <!--<th data-field="Action" data-sortable="true">Action</th>
						        <th data-field="Transfer" data-sortable="true">Transfer</th>-->

						    </tr>
						    </thead>
						    <?php 
						    	
						    	$execute=execute_sql_query($get_lead);
						    	while ($disp=execute_fetch($execute)) {
						    	$lead_id=$disp['lead_id'];	
						    ?>
						    <tr data-index="0">
						    <td class="bs-checkbox">
						    <input data-index="0" name="lead_id[]" type="checkbox" id="lead_id" value="<?php echo $lead_id?>"></td>
						    <td><?php echo $disp['lead_name'];?></td>
						    <td><?php echo $disp['lead_email'];?></td>
						    <td><?php echo $disp['lead_mobile'];?></td>
						    <td><?php echo $disp['lead_address'];?></td>
						    
						    <td><?php echo $disp['district_name'];?></td>
					<!--
						    <td> <a href="assingcalling.php?edit_lead=<?php echo urldecode($lead_id)?>">Assign</a>  
						  </td><td> <a href="transfer.php?edit_lead=<?php echo urldecode($lead_id)?>">Transfer</a>  </td>-->
						    </tr>
						    <?php }?>	
 </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                	     </form>
                      
                </div>
                <!-- /.col-lg-12 -->
            </div>
       
        </div>
	
	<?php require_once('../webtemplate/footer.php'); ?> 
		<script type="text/javascript">
    $(document).ready(function(){
        $("#transfer").attr('disabled','disabled');
     $('#lead_id').click(function () {
		    if ($(this).is(':checked')) {
		        
		       $("#transfer").attr('disabled',false);//enable input
		        
		    } else {
		        $("#transfer").attr('disabled', true); //disable input
		    }	
	});

    });

 </script>
	


 	



</body>

</html>