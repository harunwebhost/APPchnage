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
					if($title=="Users"){
						 $get_lead="SELECT * FROM district_users du,districts d WHERE du.district_id=d.district_id";
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
                            <span class="pull-right">
                          <a href="#" data-toggle="modal" data-target="#newdistricusers" class="showwhite">
                            <i class="fa fa-plus" aria-hidden="true"></i></a>
                            </span>
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
                                            <th>City</th>
                                            <th>Mobile</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
    <?php 
          $execute=execute_sql_query($get_lead);
		while ($disp=execute_fetch($execute)) {
	?>
			
        <tr class="odd gradeX" id="block">
          <td><input type="checkbox"></td>
          <td><?php echo $disp['name'];?></td>
           <td><?php echo $disp['district_user_email'];?></td>
           <td><?php echo $disp['district_name'];?></td>
            <td><?php echo $disp['district_user_mobile'];?></td>
            

         <td>
          <input  type="submit" value="Update" name="update" id="submit">
			 </td>
            <td><input  type="submit"  value="Delete" name="delete"></td>
            
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
	<?php require_once('create_users.php'); ?>
	<?php require_once('../webtemplate/footer.php'); ?> 
	<?php require_once('../webtemplate/required_javascript/unknowjsfile.js') ?>
</body>

</html>
