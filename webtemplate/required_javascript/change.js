$(document).ready(function(){
		old_pass="";
	new_pass="";
	confirm_pass="";
$("#old").blur(function(){
	var old_pass=$("#old").val();
	postData(old_pass,new_pass,confirm_pass);
});
function postData(old_pass,new_pass,confirm_pass){
	var page="../template_module/get_old_password.php";
	var call_back=function(data){
			$(".result").html(data);
			
	}
	$.ajax({
		type:'POST',
		url:page,
		data:"old_password="+old_pass+"&new_pass="+new_pass+"&confirm_pass="+confirm_pass,
		success:call_back
	});
}

 $('#newconfirm').blur('keyup change', function(){
 	newpass=$("#newpass").val();
 	newconfirm=$("#newconfirm").val();
 	if(newconfirm==newpass){

 		$("#submit").show();
 		//$(".result").hide();
 	}else{
 		$(".result").html("Verify Password");
 		$(".result").addClass("alert alert-warning");
 		$("#submit").hide();
 	}
}); 

 $("#submit").click(function(){
 	newpass=$("#newpass").val();
 	newconfirm=$("#newconfirm").val();
 	/*$(".result").html("password is update ");*/
 	postData(old_pass,newpass,newconfirm);
 	

 });
});



