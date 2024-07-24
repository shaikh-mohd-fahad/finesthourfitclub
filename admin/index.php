<?php
if(session_id()==''){
	session_start();
}
include_once("conn.php");
if(isset($_SESSION['admin_id'])){
	$q3="select * from admin where id={$_SESSION['admin_id']}";
	$run3=mysqli_query($con,$q3);
	if($run3){
	$row3=mysqli_fetch_array($run3);
	}else{
		echo"<script>alert('erro')";
	}
}else{
	echo"<script>location.href='login.php';</script>";
}
?>
<!doctype html>
<html lang="en">
<head>
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<nav class="navbar navbar-fixed navbar-expand-md navbar-dark bg-primary py-0 d-print-none">
<div class="container" style="position:relative"><a href="#" class="navbar-brand my-0"><strong><i>KickBoxing</i></strong> <strong  style="position:absolute;right: 2%;">Welcome <?php echo$row3['email'];?></strong></div></a>
</nav>
<div class="container-fluid">
<div class="row"><!-- row started -->
<div class="col-md-2 bg-light p-3 d-print-none"><!-- col-md-2 started -->
<ul class="nav nav-pills flex-column mt-4">

<li class="nav-item "> <a href="index.php" class="nav-link active" > Dashboard</a></li>
<li class="nav-item "> <a href="user_det.php" class="nav-link" > User Detail </a></li>
<li class="nav-item"> <a href="logout.php" class="nav-link">Logout</a></li>

</ul>
</div><!-- col-md-2 ended -->
<div class="col-md-10">


<div class="container mt-5">
<h1 class="text-center h1">Create slot for date <span id="div2"></span></h1>
<div class="row">
<div class="col-md-4">
<div id="date"></div>
</div>

<div class="col-md-8">
<form id="slot_form">
<input type="hidden"  name="slot_book" value="booked">
<input type="hidden" id="slot_date" name="slot_date" value="">
<div class="row">
<div class="col-6">
	Start Time:
  <input type="time" name="start" id="time1" placeholder="Time" required class="form-control">
</div>
<div class="col-6">
	End Time:
  <input type="time" required name="end" id="time2" placeholder="Time" class="form-control">
</div>
</div>
<div class="row mt-4">
<div class="col-12">
<span id="show_error" class=" my-4"></span>
<input type="submit" class="btn btn-primary  w-100" Value="Create Slot" id="sub4">


</div>
</div>
</form>
<div class="row mt-5">
<div class="col-12">
<div id="show_app"></div>
</div>
</div>
</div>
</div>
</div>


</div>
</div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function(){
	$("#date").datepicker({
	dateFormat:"mm/dd/yy",
	minDate:"0",
	maxDate:"+3"
	});
	function show_appointment(){
		//alert('funtion call');
		var selected2 = $("#date").val();
		var show_apptmnt="show_appointment";
		$.ajax({
			url:"server.php",
			type:"post",
			data:{date:selected2,appointment:show_apptmnt},
			success:function(response5){
				//alert(response5);
				$("#show_app").html(response5);
			}
		});
	}
	show_appointment();
	var selected = $("#date").val();
	$('#div2').html(selected);
	$("#slot_date").attr("value",selected);
	//alert(selected);
	$("#date").on("change",function(){
        var selected = $(this).val();
		show_appointment();
        $('#div2').html(selected);
		$("#slot_date").attr("value",selected);
    });

$("#slot_form").submit(function(e){
		e.preventDefault();
		//alert("btn clicked");
		dataa=$("#slot_form").serialize();
		$.ajax({
			url:"server.php",
			type:"post",
			data:dataa,
			success:function(response1){
				//alert(response1);
				$("#show_error").html(response1);
				//$("#show_error").fadeOut(3000);
				show_appointment();
			}
		});
	});
	
});
</script>
</body>	
</html>