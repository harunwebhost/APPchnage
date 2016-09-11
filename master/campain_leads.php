<?php require_once('../webtemplate/headtags.php'); ?>
<?php require_once('../webtemplate/header_nav.php'); ?>
				
				<?php 
					/*get page header*/
					if(isset($_GET['show'])){
						$title=$_GET['show'];
					}else{
						$title="Total Leads";
					}
					if($title=="main"){
						 
						$get_lead="SELECT * FROM app_leads al,campaigns cmpgs , districts dist
						 WHERE al.campaign_group_name=cmpgs.campaign_id
						 AND
						 al.campaign_group_name='1'
						 AND
						 al.district_name=dist.district_id";
					}if($title=="Internal"){
						$get_lead="SELECT * FROM app_leads al,campaigns cmpgs , districts dist
						 WHERE al.campaign_group_name=cmpgs.campaign_id
						 AND
						 al.campaign_group_name='2'
						 AND
						 al.district_name=dist.district_id";
					}if($title=="Cause"){
						$get_lead="SELECT * FROM app_leads al,campaigns cmpgs , districts dist
						 WHERE al.campaign_group_name=cmpgs.campaign_id
						 AND
						 al.campaign_group_name='3'
						 AND
						 al.district_name=dist.district_id";
					}

						$title=$title." Campains Leads";
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
                             <div class="pull-right"><a href="#" data-toggle="modal" data-target="#newcampain" class="showwhite">
                            <i class="fa fa-plus" aria-hidden="true"></i></a></div> 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form action="#" method="POST">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						    <thead>
						    <tr>
						        <th></th>
						        <th>Name</th>
						        <th>Email</th>
						        <th>Mobile</th>
						        <th>Address</th>
						        <th>Campain</th>
						        <th>Distric Name</th>
						        <th>update/Transfer</th>
						        

						    </tr>
						    </thead>
						    <?php 
						    	
						    	$execute=execute_sql_query($get_lead);
						    	while ($disp=execute_fetch($execute)) {
						    		$lead_id=$disp['lead_id'];
						    	?>
						    <tr>
						    <td class="bs-checkbox">
						    <input type="checkbox"></td>
						    <td><?php echo $disp['lead_name'];?></td>
						    <td><?php echo $disp['lead_email'];?></td>
						    <td><?php echo $disp['lead_mobile'];?></td>
						    <td><?php echo $disp['lead_address'];?></td>
						    <td><?php echo $disp['campaign_name'];?></td>
						    <td><?php echo $disp['district_name'];?></td>
						    <td> 
						    <a href="edit_lead.php?edit_lead=<?php echo urldecode($lead_id)?>">Edit</a>
						    </td>

						   
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
	<?php require_once('newcampain.php'); ?>
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