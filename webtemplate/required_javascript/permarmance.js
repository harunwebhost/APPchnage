$(document).ready(function(){
	var url_dest="../master/graphpage.php";
	$.ajax({
		url 	:url_dest,
		method 	:"GET",
		success :function (data){
			var employees=[];
			var total_freetrail=[];
			for(var i in data) {
				employees.push("employees"+data[i].emp_id);
				total_freetrail.push(data[i].crm_demouser_id);
			}
			var chartdata={
				labels : employees,
				datasets:[
				{
					label: "Total",
					backgroundColor: 'rgba(200,200,200,0.75)',
					borderColor: 'rgba(200,200,200,0.75)',
					data :total_freetrail
				}
				]
			};
			var ctx=$("#showchart");
			var barGraph=new Chart(ctx,{
				type : 'bar',
				data :chartdata
			});
		},
		error :function(data){
			console.log(data);
		} 
	});
});