<?php 
session_start();
require_once('db_function.php');
$login_id=$_SESSION['loggin_id'];
$otp=sql_injection($_POST['otp']); 
$sql="SELECT * FROM app_authonticate WHERE login_id='$login_id' 
and uniqid='$otp' AND status='1'";
$result=execute_sql_query($sql);
$count=sql_fetch_num_rows($result);
if($count==1){
	update_otp($login_id);
	$_SESSION['login_history_id']=track_login();
	$login_userntype=$_SESSION['login_userntype'];
	$login_userntype=str_replace(' ','_',$login_userntype);
	$login_userntype=strtolower($login_userntype);
	$_SESSION['login_userntype']=$login_userntype;
	 $page="../".$login_userntype."/dashboard.php";

	page_redirection($page,'?message=Logged In');
		
}
else {
	update_otp($login_id);
page_redirection("../index.php?","message=Invalid OPT Please Login Again");
}



?>