<?php 
if(session_id()==''){
	session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8">
<title>6 Week Optin Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
<div class="container-fluid bg-color p-3 text-center mb-4 shadow">
<h4>New Contender</h4>
<small style="font-size:12px"><span>First-Time Client</span><br>
<span>Trial Offer</span><br>
<span>Only Valid at iLoveKickboxing at 2524 MacArthur Road, Whitehall, PA</span><br></small>
<h4 class="mt-2 h4">7 Days</h3>
<h5 class="h6">Unlimited Classes</h6>
<h6 class="h6">+Free Fitness Consultation</h6>
<h3 class="mt-2">$25</h4>
<span style="font-size:12px"> Normally $30 per class</span>
</div>
<div class="container mt-3" style="margin-bottom: 150px;">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 pt-3 rounded-3 shadow  border">
	<h4 class="text-center  p-3 bg-primary text-white shadow rounded">Please fill out the attached so you can claim your spot!</h4>
	<div class="">
	<form id="form1" method="post">
	<input type="hidden" name="form1_data" value="submitted">
	  <div class="form-group p-3 bold">
		<label for="">First Name <span class="text-danger">*</span></label>
		<input type="text" required class="form-control" id="firstname" name="firstname"  placeholder="Enter First Name">
	  </div>
	  <div class="form-group p-3 bold">
		<label for="">Last Name <span class="text-danger">*</span></label>
		<input type="text" required class="form-control" id="lastname" name="lastname"  placeholder="Enter Last Name">
	  </div>
	  <div class="form-group p-3 bold">
		<label for="">Enter Mobile Number <span class="text-danger">*</span></label>
		<input type="text" required name="mobile_num"  class="form-control" id="" placeholder="Enter Mobile Number">
	  </div> 
	  <div class="form-group p-3 bold">
		<label for="">Enter Email <span class="text-danger">*</span></label>
		<input type="email" required name="email"  class="form-control" id="" placeholder="Enter ">
	  </div>
	  <div class="form-group p-3 bold">
		<label for="">Date of Birth <span class="text-danger">*</span></label>
		<input type="date" pattern="\d{2}-\d{2}-\d{4}" required name="dob" class="form-control" id="" placeholder="Enter ">
	  </div>
	  <small class="px-3">✓ By submitting this form, I agree to receive emails, text messages or other communications regarding appointment confirmations, scheduling or promotions from ILoveKickboxing</small>  
	  <div class="form-group p-3 bold text-center">
	  <button type="submit" id="sub_btn" class="btn btn-primary shadow p-3">Claim Your Voucher!</button>
	  <span class="" id="show_error"></span>
	  </div>
	</form>
	</div></div>
    <div class="col-sm-3"></div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function(){
	//submiting all data to server
	$("#form1").submit(function(e){
		e.preventDefault();
		dataa=$("#form1").serialize();
		$.ajax({
			url:"server.php",
			type:"post",
			data:dataa,
			beforeSend:function(){
			    $("#sub_btn").html("<div class='spinner-border text-light' role='status'><span class='visually-hidden'>Loading...</span></div>");
			},
			success:function(response1){
			$("#show_error").html(response1);
			}
		});
	});
});
</script>
</body>
</html>