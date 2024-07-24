<?php
if(session_id()==''){
	session_start();
}
$user_id=$_SESSION['user_id'];
include_once("conn.php");
$q7="UPDATE `user` SET `amount_status`='Success' WHERE id='$user_id'";
$run7=mysqli_query($con,$q7);
$q9="UPDATE `slots` SET `booked_by`=1+booked_by WHERE id='{$_SESSION['slot_id']}'";
mysqli_query($con,$q9);
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
<div class="container-fluid bg-color p-2 shadow text-center">
<h4>You're Booked!</h4>
<h5> Thankyou for scheduling your appointment!</h5>

<span style="font-size:12px">Get Ready to Smash Your Goals!</span><br>
<span class="d-block" style="font-size:12px">'We have sent an important Email with valueable information</span>
<h5 class="mb-0 mt-2">Refer a Friend Here</h5>
<span style="font-size:12px">Our workout is fun, but even better with friends!<br>
* Get $50 Amazon Gift Card for each friend that enrolls<br>
* Your friend gets 50% off their first month membership dues<br>
</span>
</div>
<div class="container mt-3">
<h5 class="text-center">Refer Here</h5>
<div class="text-center table-responsive">
<span id="show_error9"></span>
<table class="table table-bordered shadow">
<tr>
<th>Name</th>
<th>Email</th>
<th class="border-0"></th>
<th>Mobile Number</th>
<th class="border-0"></th>
</tr>
<?php 
$i=1;
while($i<=5){
?>
<tr>

<td><input type="text" class="form-control name<?php echo$i; ?>"></td>
<td><input type="email" class="form-control email<?php echo$i; ?>"></td>
<td class="border-0">or</td>
<td><input type="text"  class="form-control mobile_num<?php echo$i; ?>"></td>
<td  class="border-0">
<button class="btn btn-primary last_btn" value="<?php echo$i; ?>" id="last_btn_id<?php echo$i; ?>">Send Referrel</button></td>

</tr>
<?php $i++;}?>
</table>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function(){
	//submiting all data to server
	$(".last_btn").on("click",function(e){
		value=$(this).val();
		var name=$(".name"+value).val();
		var email=$(".email"+value).val();
		var mobile_num=$(".mobile_num"+value).val();
		dataa={referral:"referral",name:name,email:email,mobile_num:mobile_num};
		$.ajax({
			url:"server.php",
			type:"post",
			data:dataa,
			beforeSend:function(){
			    $("#last_btn_id"+value).html("<div class='spinner-border text-light' role='status'><span class='visually-hidden'>Loading...</span></div>");
			},
			success:function(response9){
			$("#show_error9").html(response9);
			if(response9!="<span class='text-danger'>Message not sent </span>"){
			$("#last_btn_id"+value).html("Email Sent");
			$("#last_btn_id"+value).removeClass("btn-primary");
			$("#last_btn_id"+value).addClass("btn-success");
			}
			else{
			$("#last_btn_id"+value).html("Send Email");
			}
			setTimeout(function(){
			$("#show_error9").html("");
    }, 5000);
			}
		});
	});
});
</script>
</body>	
</html>