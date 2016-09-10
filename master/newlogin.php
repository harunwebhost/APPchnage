<?php 

require_once('../comman/db_function.php');
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
$sql = "INSERT INTO $table ($keys) VALUES ($values)";

if(execute_sql_query($sql)){
	$email=sql_injection($_POST['field']['email_address']);
	$mobile=sql_injection($_POST['field']['mobile_number']);
	$password=sql_injection($_POST['field']['mobile_number']);
	$user_type=sql_injection($_POST['field']['user_type']);
	
	$status="1";
	 $login_user="INSERT INTO  app_authonticate (`user_email`,`user_password`,`user_type`,`mobile_number`,`status`)	VALUES('$email','$password','$user_type','$mobile','$status')";
	execute_sql_query($login_user);
} 
page_redirection("list_of_users.php?show=Users&","&New Account is created");
?>