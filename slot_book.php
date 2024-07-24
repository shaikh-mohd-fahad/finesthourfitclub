<?php 
if(session_id()==''){
	session_start();
}
include_once("conn.php");
$q6="select * from user where id='{$_SESSION['user_id']}'";
$run6=mysqli_query($con,$q6);
$row6=mysqli_fetch_array($run6);
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8">
<title>6 Week Optin Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.bg-color{
	background-color:#f0f0fb;
}
</style>
</head>
<body>
<div class="container text-center">
	<a href="index.php"><img src="https://images.leadconnectorhq.com/img/f_webp/q_80/r_768/u_https://firebasestorage.googleapis.com/v0/b/highlevel-backend.appspot.com/o/location%2FYTw8eqWmEUJr1K3ditd8%2Fform%2FIAGFq6fR89L8WFdWMVNz%2F863921db-0594-4877-b11c-7de58357badd.png?alt=media&token=b99a8938-e7b6-419f-8d74-b9dea3b93961" style="height:30px;" class="img-fluid my-2">
	</a>
</div>
<div class="container-fluid bg-color p-2 text-center">
<h4>Awesome!</h4>
<span style="font-size:12px">Lets Book Your First Appointment</span><br>
<span class="d-block" style="font-size:12px">Please arrive 30 minutes before first class to receive intoductory information and equipment</span>
</div>
<div class="container p-3">
<h4 class="text-center h4">Available slots for date <span id="div2"></span></h4>
<!-- row start -->
<div class="row">
<div class="col-md-6">
<center>
<!-- datepicker start-->
<div id="date"></div>
<!-- datepicker end-->
</center>
</div>
<div class="col-md-6 text-center">
<b><div id="show_app_detail" class=" text-success"></div></b>
<div id="show_app"> </div>
</div>
</div>
<!-- row end -->
</div>
<div class="container my-3">
<form class="" id="form_book_slot">
<input type="checkbox" id="checkedbox"> I will arrive 30 minutes early to this apointment to complete a free fitness assessment and receive introductory information. I am reserving a unique spot in this limited-size class so I will call 610-605-2323 or Email whitehall@ilovekickboxing.com at least 24 hours in advance if I can not make this apointment
<span id="show_error7"></span>
<button type="submit" class="btn btn-primary mt-3 d-block w-100" id="btn2">Submit</button>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function(){
	var btn_selected=0;
	$("#date").datepicker({
	dateFormat:"mm/dd/yy",
	minDate:"0",
	maxDate:"+3"
	});
	function show_appointment(){
		var selected2 = $("#date").val();
		var show_apptmnt="user_show_appointment";
		$.ajax({
			url:"server.php",
			type:"post",
			data:{date:selected2,appointment:show_apptmnt},
			success:function(response5){
				$("#show_app").html(response5);
			}
		});
	}
	show_appointment();
	var selected = $("#date").val();
    $('#div2').html(selected);
	$("#date").on("change",function(){
        var selected = $(this).val();
        $('#div2').html(selected);
		show_appointment();
    });
	$("#btn2").attr("disabled",true);
	$('#checkedbox').change(function() {
	var a= $('#checkedbox').is(':checked');
	book_app_fun();
	if(btn_selected==1){
	$('#show_error7').html("");
	if(a==true){
		$("#btn2").attr("disabled",false);
	}
	else{
		$("#btn2").attr("disabled",true);
	}
	}else{
		$('#show_error7').html("<br><span class='text-danger'><b>Please Select Slot</span></b>");
	}
	});
	var temp;
	var temp2;
	function book_app_fun(){
	$("body").on("click",".book_app",function(){
		var value = $(this).val();
		temp2=value;
		var tvalue2 = $(this).text();
		temp=tvalue2;
		btn_selected=1;
		$('#show_error7').html("");
		var selected3 = $("#date").val();
		$("#show_app_detail").html("Your slot time is "+tvalue2+" on date "+selected3);
		var a= $('#checkedbox').is(':checked');
		if(a==true){
		$("#btn2").attr("disabled",false);
		}
		else{
			$("#btn2").attr("disabled",true);
		}
    });
	}
	book_app_fun();
	
$("#form_book_slot").submit(function(e){
		e.preventDefault();
		var selected4 = $("#date").val();
		dataa={form_book_btn:"booked_slot",slot_date:selected4,slot_time:temp,slot_id:temp2};
		$.ajax({
			url:"server.php",
			type:"post",
			data:dataa,
			beforeSend:function(){
			    $("#btn2").html("<div class='spinner-border text-light' role='status'><span class='visually-hidden'>Loading...</span></div>");
			},
			success:function(response7){
			$("#show_error7").html(response7);
			}
		});
	});
});
</script>
</body>	
</html>