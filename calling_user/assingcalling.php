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

                        $table=sql_injection($_POST['table_name']);
                        $message="Record is Inserted";
                          foreach($_POST['field'] as $x=>$x_value)
                          {
                          $keys .= $x.',';
                          $filter_data=sql_injection($x_value);
                          $values.='"'.$filter_data.'",';
                        }
                        $values=rtrim($values,',');
                        $keys=rtrim($keys,',');
                        echo $sql = "INSERT INTO $table ($keys) VALUES ($values)";
                         execute_sql_query($sql); 
                        page_redirection("calling_leads.php?show=Calling&","New Account is created");

         	}
         
         	/*get page header*/
         	if(isset($_GET['edit_lead'])){
         			 $edit_lead=sql_injection($_GET['edit_lead']);
         		
         	}
         
         	
         	
          ?>
      <div class="row">
         <div class="col-lg-12">
            <div class="panel panel-primary">
               <div class="panel-heading">Assign for calling</div>
               <div class="panel-body">
                  <form role="form" action="#" method="POST">
                     <input type="text" name="field[lead_id]" value="<?php echo check_isset($edit_lead);?>">
                    <input type="text" name="table_name" value="calling_leads">
                     
                     
                     <div class="col-md-12">
                        <div class="col-md-4 col-md-offset-4">
                           <div class="form-group">
                              <label>Selects</label>
                              <select class="form-control" name="field[userslist_id]">
                              <?php getcallinguserlist(); ?>
                              </select>
                           </div>
                        </div>
                        
                      
                     </div>
                     <div class="form-group col-md-4 col-md-offset-4">
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
   


</body>
</html>