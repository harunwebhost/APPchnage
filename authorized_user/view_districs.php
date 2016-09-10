<?php require_once('../webtemplate/headtags.php'); ?>
<?php require_once('../webtemplate/header_nav.php'); ?>
 
	
<?php 
					  $currentpage=urldecode('view_districs.php?show=Districts&page1=districts&id=district_id');
					/*get page header*/
					if(isset($_GET['show'])){
						$title=$_GET['show'];
					}else{
						$title="Total Leads";
					}
					if($title=="Districts"){
						  $get_lead="SELECT * FROM districts WHERE district_id='$district_user_id'";
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
                                        	<th></th>
                                            <th>Distric Name</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
    <?php 
          $execute=execute_sql_query($get_lead);
		while ($disp=execute_fetch($execute)) {
	?>
			
        <tr class="odd gradeX" id="block">
          <td><input type="checkbox"></td>
          <td> 
          <input type="text" 
          value="<?php echo $disp['district_name'];?>" name="field[district_name]"  id="dispaly" title="<?php echo $disp['district_name'];?>" style="display:none"/>
           <p id="showdata"><?php echo $disp['district_name'];?></p>
          </td>
       
         
            
        </tr>
                             
	 <?php } ?> 
                                     
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
	<?php //require_once('createnew_distric.php'); ?>
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
