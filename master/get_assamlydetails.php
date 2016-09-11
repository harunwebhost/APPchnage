<?php
require_once("../comman/db_function.php");
$assemblis=array();

if(!empty($_GET["district_id"])) {
	 $query ="SELECT * FROM assemblis WHERE district_id = '" . $_GET["district_id"] . "'";
	$results = execute_sql_query($query);

	while ($get_details=execute_fetch($results)) {
		$assemblis[] = $get_details;
	}
}
?>

<div class="col-md-12">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Selects</label>
                              <select class="form-control" name="field[assembly_name]" id="assembly_name" required>
                                 <option value="">Select Assemblies</option>
								<?php 
								foreach ($assemblis as $value) {
								?>
                                 <option value=""><?php echo $value['assembly_name'];?></option>
                              <?php }?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4">

                         <div class="form-group">
                              <label>Ward or zip</label>
                              <select class="form-control" name="field[ward_or_zp_name]" id="assembly_name" required>
                                 <option value="">Ward or zip</option>
								<?php 
								foreach ($assemblis as $value) {
								?>
                                 <option value=""><?php echo $value['ward_zip'];?></option>
                              <?php }?>
                              </select>
                           </div>

                        </div>
                        <div class="col-md-4">
                           
							<div class="form-group">
                              <label>Pooling Booth</label>
                              <select class="form-control" name="field[polling_booth_no]" id="assembly_name" required>
                                 <option value="">Pooling Booth</option>
								<?php 
								foreach ($assemblis as $value) {
								?>
                                 <option value=""><?php echo $value['pooling_booth'];?></option>
                              <?php }?>
                              </select>
                           </div>
                           
                          
                        </div>
                     </div> 