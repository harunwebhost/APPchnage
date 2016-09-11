<?php require_once('../webtemplate/headtags.php'); ?>
<body>
   <div id="wrapper">
   <!-- Navigation -->
   <?php require_once('../webtemplate/header_nav.php'); ?>
   <div id="page-wrapper">
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Transfer</h1>
         </div>
         <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->
      <?php 
         if(isset($_POST['update']) && !empty($_POST['update'])){
         				
                     $keys="";
         				$values="";	
                     $primary_key="lead_id";
         			   $message="Record is updated";
         			  foreach($_POST['field'] as $x=>$x_value)
         			  {
         			  $keys= $x;
         			  $filter_data=sql_injection($x_value);
         			  $values.=$keys."="."'$filter_data',";
         			}
         		   $values=rtrim($values,',');
                  $removecomma=rtrim($_POST['lead_id'],',');
                  $delete_key=explode(",",$removecomma);
                  foreach ($delete_key as $value) {
                     $update_key=str_replace(',', '',$value );
                     $sql = "update app_leads SET $values WHERE  $primary_key=$update_key";
                     $update_values=sql_injection($sql);
                     execute_sql_query($sql);
                  }
               
               lead_tracker("update",$update_key,$update_values);
               $page="lead_info.php?show=un-assigned";
               $message="&message=Row Is updated";
         		page_redirection($page,$message);
         	}
            $result="";
            if(isset($_POST['lead_id'])){
                  foreach($_POST['lead_id'] as $item){
                        $result .= $item.",";
                  }
            }
            
         	
         	
          ?>
      <div class="row">
         <div class="col-lg-12">
            <div class="panel panel-primary">
               <div class="panel-heading">Transfer Leads </div>
               <div class="panel-body">
                  <form role="form" action="#" method="POST">
                     <input type="hidden" name="lead_id" value="<?php echo $result;?>">
                   
                     <div class="col-md-12">
                       
                       
                        <div class="col-md-4 col-md-offset-4">
                           <div class="form-group">
                              <label>Distric</label>
                              <select class="form-control" required name="field[district_name]" id="district_name">
                              <option value="">Select Distric</option>
                              <?php distric_list(check_isset($olddata['district_name'])); ?>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div id="showslecttion">
                        
                     </div>
                     
                     <div class="col-md-12">
                        <div class="col-md-4 col-md-offset-4">
                           <div class="form-group">
                              <label>Selects</label>
                              <select class="form-control" name="field[campaign_group_name]" required>
                              <?php campaings(check_isset($olddata['campaign_group_name'])); ?>
                              </select>
                           </div>
                        </div>
                       
                        
                     </div>
                     <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="update" name="update">
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- /.col-->
      </div>
   </div>
   <!--/.main-->
   <?php require_once('../webtemplate/footer.php'); ?> 
   <script type="text/javascript">
      $(document).ready(function(){
      	$("#district_name").change(function(){
      		district_id=$("#district_name").val();
      		var url="get_assamlydetails.php?district_id="+district_id;
      		$.ajax({
      			/*type	: 	'GET',*/
      			//data 	: 	'district_id='+district_id,
      			url		: 	url,
      			success :	function(data){
      				//$("#showslecttion").load('get_assamlydetails.php');
      				$("#showslecttion").load(url);
      			}	
      		});
      	});
      });
      
   </script>


</body>
</html>