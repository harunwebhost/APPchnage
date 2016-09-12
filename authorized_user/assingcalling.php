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
         				$table=sql_injection($_POST['table_name']); 
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
                     $sql = "INSERT INTO $table ($keys) VALUES ($values)";
                     echo $update_values=sql_injection($sql);
                    // execute_sql_query($sql);
                  }
               

                           

                        die();

                        execute_sql_query($sql); 
                        page_redirection("calling_leads.php?show=Calling&","New Account is created");

         	}
         
         	/*get page header*/
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
               <div class="panel-heading">Assign for calling</div>
               <div class="panel-body">
                  <form role="form" action="#" method="POST">
                           <input type="text" name="lead_id" value="<?php echo $result;?>">
            
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