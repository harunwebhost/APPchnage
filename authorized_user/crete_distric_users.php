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
	$email=sql_injection($_POST['field']['district_user_email']);
	$mobile=sql_injection($_POST['field']['district_user_mobile']);
	$password=sql_injection($_POST['field']['district_user_mobile']);
	$usertype=sql_injection("distric_user");
	$status="1";
	 $login_user="INSERT INTO  app_authonticate (`user_email`,`user_password`,`user_type`,`mobile_number`)	VALUES('$email','$password','$usertype','$mobile')";
	execute_sql_query($login_user);
} 
page_redirection("view_users.php?show=Users&","&New Account is created");
?>