<?php
if(session_id()==''){
	session_start();
}
$user_id=$_SESSION['user_id'];
include_once("conn.php");
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
<div class="container-fluid text-center py-3 bg-color">
<h4 class="text-center" >Payment</h4>
<span class="text-center" style="font-size:12px">Invest in Yourself!</span>
</div>
<div class="container my-3">
<h4 class="text-decoration-underline">Non editable info:</h4>
<div class="row">
<?php
$user_id=$_SESSION['user_id'];
$q10="select * from user where id='$user_id'";
$run10=mysqli_query($con,$q10);
$row10=mysqli_fetch_array($run10);

?>
<div class="col-md-3 fw-bold col-6">
First Name:
</div>
<div class="col-md-3 col-6">
<?php echo$row10['firstname'];?>
</div>
<div class="col-md-3 fw-bold col-6">
Last Name: 
</div>
<div class="col-md-3 col-6 ">
<?php echo$row10['lastname'];?>
</div>
<div class="col-md-3 fw-bold col-6">
Email: </div>
<div class="col-md-3 col-6">
<?php echo$row10['email'];?>
</div>
<div class="col-md-3 fw-bold col-6">
Phone Number: </div>
<div class="col-md-3 col-6">
<?php echo$row10['mobile_num'];?>
</div>
<div class="col-md-3 fw-bold col-6">
Appointment Date: </div>
<div class="col-md-3 col-6">
<?php echo$row10['select_date'];?>
</div>
<div class="col-md-3 fw-bold col-6">
Appointment Time </div>
<div class="col-md-3 col-6">
<?php echo$row10['select_time'];?>
</div>
<div class="col-md-3 fw-bold col-6">
Date of Birth: </div>
<div class="col-md-3 col-6">
<?php echo$row10['dob'];?>
</div>
<div class="col-md-3"></div>
</div>
</div>
<div class="container">
<h4 class="text-decoration-underline">Payment methods are</h4> 
<b>Stripe:</b>
<?php
$amount="free";
if($_GET['val']=="five"){
$amount=59.99;
?>
<a href="https://buy.stripe.com/test_cN24jnbZldd4dGw4gj"><button href="" type="button" id="sub_btn" class='btn btn-primary buyy2 mb-3' value='five' >Buy $59.99</button></a>
<?php
}else if($_GET['val']=="three"){
$amount=39.99;
?>
<a href="https://buy.stripe.com/test_eVa6rv7J5dd4dGwdQS"><button href="" type="button"  id="sub_btn" class='btn btn-primary buyy2 mb-3' value='three' >Buy $39.99</button></a>
<?php
}else{
echo"<a href='success.php'><button class='btn btn-primary buyy2 mb-3'  id='sub_btn' value='free' >You Choose Free Service</button></a>";
}
$q7="UPDATE `user` SET `amount`='$amount' WHERE id='$user_id'";
$run7=mysqli_query($con,$q7);
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function(){
	//submiting all data to server
	$(".buyy2").on("click",function(e){
		value=$(this).val();
		//alert(value);
		
		dataa={buyy2:"buyy2",val:value};
		$.ajax({
			url:"server.php",
			type:"post",
			data:dataa,
			beforeSend:function(){
			    $("#sub_btn").html("<div class='spinner-border text-light' role='status'><span class='visually-hidden'>Loading...</span></div>");
			},
			success:function(response9){
			$("#show_error9").html(response9);
			//alert(response1);
			}
		});
	});
});
</script>
</body>	
</html>