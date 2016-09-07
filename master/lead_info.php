<?php require_once('../webtemplate/headtags.php'); ?>
<?php require_once('../webtemplate/header_nav.php'); ?>
				<?php 
					/*get page header*/
					if(isset($_GET['show'])){
						$title=$_GET['show'];
					}else{
						$title="Total Leads";
					}
					if($title=="assigned"){
						 $get_lead="SELECT * FROM app_leads al,campaigns cmpgs WHERE al.campaign_group_name=cmpgs.campaign_id";
						 $campaign_name="";
					}elseif($title=="un-assigned"){
						 $get_lead="SELECT * FROM app_leads WHERE campaign_group_name=''";
						 $campaign_name="";
					}else{
						$get_lead="SELECT * FROM app_leads";
						$getdetails="SELECT * FROM app_leads al,campaigns cmpgs WHERE al.campaign_group_name=cmpgs.campaign_id";
						$details=execute_sql_query($getdetails);
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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <?php echo strtoupper($title); ?> 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form action="#" method="POST">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						    <thead>
						    <tr>
						        <th data-field="state" data-checkbox="true" ></th>
						        <th data-field="lead_name" data-sortable="true">Name</th>
						        <th data-field="lead_email"  data-sortable="true">Email</th>
						        <th data-field="lead_mobile" data-sortable="true">Mobile</th>
						        <th data-field="lead_address" data-sortable="true">Address</th>
						        <th data-field="source_of_lead" data-sortable="true">Campain</th>
						        <th data-field="district_name" data-sortable="true">Distric Name</th>
						        <th data-field="Action" data-sortable="true">Action</th>
						        <th data-field="Transfer" data-sortable="true">Transfer</th>

						    </tr>
						    </thead>
						    <?php 
						    	
						    	$execute=execute_sql_query($get_lead);
						    	while ($disp=execute_fetch($execute)) {
						    		$lead_id=$disp['lead_id'];
								if($title=="Total Leads"){
									$get_values=execute_fetch($details);
									if(!empty($get_values['campaign_group_name'])){
										$campaign_name=$get_values['campaign_name'];
									}else{$campaign_name="";}
								}
								if($title=="assigned"){
									$campaign_name=$disp['campaign_name'];
								}	


								?>
						    <tr data-index="0">
						    <td class="bs-checkbox">
						    <input data-index="0" name="toolbar1" type="checkbox"></td>
						    <td><?php echo $disp['lead_name'];?></td>
						    <td><?php echo $disp['lead_email'];?></td>
						    <td><?php echo $disp['lead_mobile'];?></td>
						    <td><?php echo $disp['lead_address'];?></td>
						    <td><?php echo $campaign_name;?></td>
						    <td><?php echo $disp['district_name'];?></td>
						    <td> <a href="edit_lead.php?edit_lead=<?php echo urldecode($lead_id)?>">Edit</a>  </td>

						     <td> <a href="transfer.php?edit_lead=<?php echo urldecode($lead_id)?>">Transfer</a>  </td>
						    </tr>
						    <?php }?>	
 </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
       
        </div>
	<?php require_once('createnew_distric.php'); ?>
	<?php require_once('../webtemplate/footer.php'); ?> 
	
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	


 	<script type="text/javascript">
    $(document).ready(function(){
        //$("#block input,select").attr('readonly',true);

    });
    $('#block #showdata').on('click', function() {
       $(this).hide();
       $('#dispaly').show();

    });

 </script>



</body>

</html>