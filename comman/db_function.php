<?php 
    require_once('connection.php');
	/*sql query functions*/
	function execute_sql_query($sql){
       
		$connection=db_connection();
		$result=mysqli_query($connection,$sql);
		
		if(!$result){
			sql_error($connection);
		}else{
			return $result;
		}
	}

	/*fetch from database*/
	function execute_fetch($result){
		
		$fetch=mysqli_fetch_array($result);
		if(!$fetch){
				//sql_comman_error();
		}else
		{
			return $fetch;
		}
	}

	/*sql error*/
	function sql_error($connection){
		echo "you have an error please check".mysqli_error($connection);
		die();
		
		
	}

/*Reset OTP*/
function update_otp($login_id){
    $optunset="update app_authonticate SET uniqid='optisnotfound'";
    execute_sql_query($optunset);
}

/*Track Login*/
function track_login(){
    $connection=db_connection();
    $ip=get_user_ip_address();
    $login_id=$_SESSION['loggin_id'];
    $logged_user_type=$_SESSION['login_userntype'];
    $current_time=current_data_time();
    $sql_track="INSERT INTO app_logins_history (logged_ip,user_type,logged_id,logged_time)
    VALUES ('$ip','$logged_user_type','$login_id','$current_time')";
    mysqli_query($connection,$sql_track);
    $track_id=mysqli_insert_id($connection);   
    return $track_id;
}

/*
	function sql_comman_error(){
		die("your are doing some mistakes".mysqli_error());
	}*/
	function sql_fetch_num_rows($sql){
		return mysqli_num_rows($sql);
	}
function sql_injection($values){
	$connection=db_connection();
	$values=trim($values);
	return mysqli_real_escape_string($connection,$values);
}
function convert_spaces_into_underscore($title){
return str_replace(' ', '_', $title);
}
function convert_underscore_into_spaces($title){
	return str_replace('_', ' ', $title);
}
	/*get the main pages*/
	function campaings($campaign_group_name){
		
			$sql="select * from campaigns"; 
			$result=execute_sql_query($sql);
			while ($campaigns=execute_fetch($result)) {
			?>
			<option value="<?php echo $campaigns['campaign_id'] ?>"
             <?php if($campaigns['campaign_name']==$campaign_group_name){echo "selected"; } ?>>
            <?php echo $campaigns['campaign_name']?></option>
		<?php }
	}

function userslist(){
?>
                <option value="CALLING USER">CALLING USER</option>
                <option value="AUTHORIZED USER">AUTHORIZED USER</option>
                 <option value="SUPERVISOR USER">SUPERVISOR USER</option>
                  <option value="MANAGER USER">MANAGER USER</option>
<?php 
} 


    function distric_list($disctric){
        
            $sql="select * from districts"; 
            $result=execute_sql_query($sql);
            while ($districts=execute_fetch($result)) {
            ?>
            <option value="<?php echo $districts['district_id'] ?>"
             <?php if($districts['district_name']==$disctric){echo "selected"; } ?>>
            <?php echo $districts['district_name']?></option>
        <?php }
    }









function display_data($data){
	echo $data;
}

function shor_information($data,$limit){
	$words = preg_split('/\s+/', $data);
	 $words = array_slice($words, 0, $limit);
	 return implode(" ",$words);
}

function create_url($page,$menus_title){
$url =<<<EOD
<a href="{$page}">{$menus_title}</a>
EOD;
return $url;
}

function get_user_ip_address(){
	return $user_ip_address=$_SERVER['REMOTE_ADDR'];

}

function page_redirection($pagename,$message){
?>
<script type="text/javascript">
    document.location="<?php echo $pagename.$message ?>";
</script>
<?php 
 }
	function check_user(){
		session_start();
		if(!isset($_SESSION['username']) && !isset($_SESSION['id'])){
			//page_redirection('../index.php','please login again');
		}
	}
?>


<?php function check_session(){
        if(!isset($_SESSION['login_username']) && !isset($_SESSION['login_userntype'])){
            page_redirection("../index.php",'Login Once Again');
        }
} 


function check_empty($value){
    if(empty($value)){
        $value="";
    }else{
        $value=$value;
    }
    return $value;
}

?>



<?php 
     function todays_date(){
             $date=current_data_time();
            return $today=substr($date, 0,10);
        }
         function current_data_time(){
           date_default_timezone_set('Asia/calcutta');
          return date('Y-m-d h:i:s');
    }

    function convert_date($date){
        /*converting date into yy-mm-dd*/
        $date_to_convert=explode('-', $date);
        return  $date_to_convert['2']."-".$date_to_convert[1]."-".$date_to_convert[0];
    }
    
 ?>

<?php 
set_time_limit(0);
    function get_my_total($status){
        $status=sql_injection($status);
    if($_SESSION['login_userntype']=="master"){
        $sql_get_total="SELECT * FROM crm_leads WHERE lead_status='$status'";
     }else{
        $emp_id=logged_user_id();
                $sql_get_total="SELECT * FROM crm_leads WHERE lead_status='$status' AND emp_id='$emp_id'";
    }
            $excute_total=execute_sql_query($sql_get_total);
            $total=sql_fetch_num_rows($excute_total);
            if($total>0){
                return $total;
            }else{
                return 0;
            }
            
    }
 ?>

<?php 
        function get_emp(){
            $select_emp="SELECT * FROM crm_employer";
            $getemp=execute_sql_query($select_emp);
            while ($emp=execute_fetch($getemp)) {
                ?>
                <option value="<?php echo $emp['emp_id'] ?>"> <?php echo $emp['emp_name'] ?> </option>
            <?php 
        }
        }
        
 ?>

 <?php 
        function get_lead_current_status(){
            $select_status="SELECT DISTINCT lead_status  FROM crm_leads";
            $getlead=execute_sql_query($select_status);
            while ($lead_status=execute_fetch($getlead)) {
                ?>
                <option value="<?php echo $lead_status['lead_status'] ?>"> <?php echo $lead_status['lead_status'] ?> </option>
            <?php 
        }
        }
        
        /*Updating*/
    function get_update_records(){
        date_default_timezone_set('Asia/Kolkata');
        $current_time=date('Y-m-d H:i:s');  
        $current_ip=$_SERVER['REMOTE_ADDR'];
        $added_by=1; 
        $update="modified_date='$current_time',modified_ip='$current_ip',modified_by='$added_by'";
        return $update;
        }

        function get_server(){
            date_default_timezone_set('Asia/Kolkata');
            $current_time=date('d-m-Y H:i:s');  
            $current_ip=$_SERVER['REMOTE_ADDR'];
            $added_by=1;
            $server_details="'$current_time','$current_ip','$added_by'";
            return $server_details;
    }

    function check_isset($getvalue){
        if(isset($getvalue)){
            return $getvalue;
        }else{
            return "";
        }
    }
/*You can delete this funtion*/
    function logged_distric_users1(){
        $logged_email_address=$_SESSION['login_email'];
        $sql="SELECT * FROM district_users WHERE  district_user_email='$logged_email_address'";
        $excute_sql=execute_sql_query($sql);
        $sql_fech_array=execute_fetch($excute_sql);
        $disctric_information['district_user_email']  = $sql_fech_array['district_user_email'];
        $disctric_information['district_user_mobile']  = $sql_fech_array['district_user_mobile'];
        $disctric_information['district_user_id']  = $sql_fech_array['district_user_id'];
        return $disctric_information;
    }

    function logged_distric_users(){
        @$logged_email_address=$_SESSION['login_email'];
        $sql="SELECT * FROM  userslists WHERE  email_address='$logged_email_address'";
        $excute_sql=execute_sql_query($sql);
        $sql_fech_array=execute_fetch($excute_sql);
        $disctric_information['district_user_email']  = $sql_fech_array['email_address'];
        $disctric_information['district_user_mobile']  = $sql_fech_array['mobile_number'];
        $disctric_information['district_user_id']  = $sql_fech_array['district_id'];
        $disctric_information['campaign_id']  = $sql_fech_array['campaign_id'];
        $disctric_information['calling_id']  = $sql_fech_array['userslist_id'];
         
        return $disctric_information;
    }

    /*Creating calling user list -disctric vaice*/

    function getcallinguserlist(){
         $logged_distric_users=logged_distric_users();
        $district_user_id=$logged_distric_users['district_user_id'];
        $sql_calling="SELECT  * FROM userslists WHERE  district_id='$district_user_id' AND user_type='CALLING USER'";
        $resutl_calling=execute_sql_query($sql_calling);
        while ($get_calling=execute_fetch($resutl_calling)) {
        ?>
        <option value="<?php echo $get_calling['userslist_id']?>"><?php echo $get_calling['name'];?></option>
        <?php 
    }
    }


/*calling user details*/


    





   
   function lead_tracker($opration,$lead_id,$upadtevalues){

    $ip=get_user_ip_address();
    $login_id=$_SESSION['loggin_id'];
    $logged_user_type=$_SESSION['login_userntype'];
    $current_time=current_data_time();
if($opration=="insert" && $upadtevalues==""){
        /*get lead_id here*/
        $lead_id=$lead_id;
        /*get who created*/
        $what="New created";
        /*when created*/
        $when_did="Lead Created By user type".$logged_user_type."Created at".$current_time;
        /*from which ip created*/
        $which_ip="Lead created From IP address".$ip;
        /*why created*/
        $why="New Lead for process";
            $sql="insert into   lead_trigger 
            (`lead_id`,`what`,`when_did`,`which_ip`,`why`) 
            VALUES
            ('$lead_id','$what','$when_did','$which_ip','$why')";
            execute_sql_query($sql);
}
if($opration=="update" && !empty($upadtevalues)){
    /*get lead_id here*/
         $lead_id=$lead_id;
        
        /*get who created*/
        $what="updated" .$upadtevalues;
        /*when created*/
        $when_did="Lead update  By user type".$logged_user_type." modified at".$current_time;
        /*from which ip created*/
        $which_ip="Lead update  By IP address".$ip;
        /*why created*/
        $why="New Lead for process";
            $sql="insert into   lead_trigger 
            (`lead_id`,`what`,`when_did`,`which_ip`,`why`) 
            VALUES
            ('$lead_id','$what','$when_did','$which_ip','$why')";
            execute_sql_query($sql); 
}

}



 ?>

