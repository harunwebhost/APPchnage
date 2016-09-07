<?php 
session_start();
	require_once("../functions/db_function.php");
	 $old_password=sql_injection($_POST['old_password']);
	
	 $logged_useremail=$_SESSION['login_email'];
 	$logged_usertype=$_SESSION['login_userntype'];
if(isset($old_password) && empty($_POST['new_pass']) && empty($_POST['confirm_pass'])){
	 $check_old_pass=("SELECT * FROM crm_users 
		WHERE user_password='$old_password' 
	 	AND user_email='$logged_useremail'");
		if($result=execute_sql_query($check_old_pass)){
		 $count=sql_fetch_num_rows($result);
		if($count>0){
echo $html = <<<SHOW
<script>
$("#newconfirm").show();
$("#newpass").show();
</script>
SHOW;
		}else{
				echo  "<div class='alert alert-warning'>old password is wrong</div>";
			}
}
}else{
	 $new_pass=sql_injection($_POST['new_pass']);
	 $confirm_pass=sql_injection($_POST['confirm_pass']);
	if($new_pass==$confirm_pass){
		 $update_pass="UPDATE crm_users SET user_password='$new_pass' 
		WHERE user_email='$logged_useremail' AND user_type='$logged_usertype'LIMIT 1";
		if(execute_sql_query($update_pass)){
			echo "<div class='alert alert-success'>Password is updated</div>";
			page_redirection("../functions/logout.php","password is updated ");
		}else{
			echo "Please verify New & Confirm Password";
		}
	}
	
}


?>