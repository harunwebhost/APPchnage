<?php require_once('../webtemplate/headtags.php'); ?>
<?php require_once('../webtemplate/header_nav.php'); ?>
 
	
		

				<?php 
					  $currentpage=urldecode('view_users.php?show=Users&page1=district_users&id=district_user_id');
					/*get page header*/
					if(isset($_GET['show'])){
						$title=$_GET['show'];
					}else{
						$title="Total Leads";
					}
					if($title=="assemblis"){
						 $get_lead="SELECT * FROM assemblis asmbly, districts distric 
						 where
						 asmbly.district_id=distric.district_id
						 ";
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
						        <th data-field="lead_email"  data-sortable="true">Distric</th>
						        <th data-field="lead_mobile" data-sortable="true">Ward</th>
						        <th data-field="lead_city" data-sortable="true">Booth</th>
						        
						    </tr>
						    </thead>
						    <?php 
						    	
						    	$execute=execute_sql_query($get_lead);
						    	while ($disp=execute_fetch($execute)) {
						    		
						    	?>
						    <tr data-index="0">
						    <td class="bs-checkbox">
						    <input data-index="0" name="toolbar1" type="checkbox"></td>
						    <td><?php echo $disp['assembly_name'];?></td>
						    <td><?php echo $disp['district_name'];?></td>
						    <td><?php echo $disp['ward_zip'];?></td>
						    <td><?php echo $disp['pooling_booth'];?></td>
						   
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
