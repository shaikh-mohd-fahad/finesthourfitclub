<?php
define("PAGE","Requests");
define("Title","Requests");
include_once('../conn.php');
include_once('includes/header.php');
$q11="select * from request";
$run11=mysqli_query($con,$q11);
if(isset($_POST['close'])){
	$id=$_POST['id'];
	$q12="delete from request where id='$id'";
	$run12=mysqli_query($con,$q12);
	if($run12){
		echo"<script>location.href='requests.php';</script>";
	}
}
if(isset($_POST['view'])){
	$id=$_POST['id'];
	$q13="select * from request where id='$id'";
	$run13=mysqli_query($con,$q13);
	$row13=mysqli_fetch_array($run13);
	$request_id=$row13['id'];
	$request_info=$row13['request_info'];
	$request_desc=$row13['request_desc'];
	$requester_name=$row13['requester_name'];
	$requester_add1=$row13['requester_add1'];
	$requester_add2=$row13['requester_add2'];
	$requester_city=$row13['requester_city'];
	$requester_state=$row13['requester_state'];
	$requester_zip=$row13['requester_zip'];
	$requester_email=$row13['requester_email'];
	$requester_mobile=$row13['requester_mobile'];
	$request_date=$row13['request_date'];
}
if(isset($_POST['Assign'])){
	$req_id=$_POST['req_id'];
	$req_info=$_POST['req_info'];
	$req_desc=$_POST['req_desc'];
	$req_name=$_POST['req_name'];
	$req_add1=$_POST['req_add1'];
	$req_add2=$_POST['req_add2'];
	$req_city=$_POST['req_city'];
	$req_state=$_POST['req_state'];
	$req_zip=$_POST['req_zip'];
	$req_mobile=$_POST['req_mobile'];
	$req_email=$_POST['req_email'];
	$req_date=$_POST['req_date'];
	$req_tech=$_POST['req_tech'];
	$q14="insert into assignwork(request_id, request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email,requester_date, requester_mobile, assigntech) values('$req_id', '$req_info', '$req_desc', '$req_name', '$req_add1', '$req_add2', '$req_city', '$req_state', '$req_zip', '$req_email','$req_date', '$req_mobile', '$req_tech')";
	$run14=mysqli_query($con,$q14);
	if($run14){
		$msg="<div class='alert alert-success mt-3'>Work Assigned</div>";
	}
}
?>
<div class="col-md-9 col-sm-9 mt-5 ml-4">
<div class="row">
<div class="col-md-5">
<?php
while($row11=mysqli_fetch_array($run11)){
?>
<div class="card mb-4">
<div class="card-header">
Request Id: <?php echo$row11['id'];?>
</div>
<div class="card-body">
<h5>Request Info : <small><?php echo$row11['request_info'];?></small></h5>
<p class="card-text"><?php echo$row11['request_desc'];?></p>
<p class="card-text">Requester Date : <?php echo$row11['request_date'];?></p>
<div class="float-right">
<form action="" class="" method="post">
<input type="hidden" name="id" value="<?php echo$row11['id'];?>">
<input type="submit" name="view" class="btn btn-danger" value="View">
<input type="submit" name="close" class=" ml-3 btn btn-secondary" value="Close">
</form>
</div>
</div>
</div>
<?php
}
?>
</div>
<div class="col-md-6 ml-4 jumbotron">
<form action="" method="post">
<div class="form-group">
Request Id
<input type="text" value="<?php if(isset($request_id)){echo$request_id;}?>" class="form-control" readonly name="req_id">
</div>
<div class="form-group">
Request Info
<input type="text" value="<?php if(isset($request_info)){echo$request_info;}?>" class="form-control" name="req_info">
</div>
<div class="form-group">
Request Description
<input type="text" value="<?php if(isset($request_desc)){echo$request_desc;}?>" class="form-control"  name="req_desc">
</div>
<div class="form-group">
Requester Name
<input type="text" value="<?php if(isset($requester_name)){echo$requester_name;}?>" class="form-control"  name="req_name">
</div>
<div class="row">
<div class="col-sm-6">

Requester Address Line 1
<input type="text" value="<?php if(isset($requester_add1)){echo$requester_add1;}?>" class="form-control"  name="req_add1">

</div>
<div class="col-sm-6">
Requester Address Line 2
<input type="text" value="<?php if(isset($requester_add2)){echo$requester_add2;}?>" class="form-control" name="req_add2">
</div>
</div>
<div class="row">
<div class="col-sm-4">
City
<input type="text" value="<?php if(isset($requester_city)){echo$requester_city;}?>" class="form-control" name="req_city">
</div>
<div class="col-sm-4">
State
<input type="text" value="<?php if(isset($requester_state)){echo$requester_state;}?>" class="form-control"  name="req_state">
</div>
<div class="col-sm-4">
Zip
<input type="text" value="<?php if(isset($requester_zip)){echo$requester_zip;}?>" class="form-control" name="req_zip">
</div>
</div>
<div class="row">
<div class="col-sm-8">
Email
<input type="text" value="<?php if(isset($requester_email)){echo$requester_email;}?>" class="form-control"  name="req_email">
</div>
<div class="col-sm-4">
Mobile
<input type="text" value="<?php if(isset($requester_mobile)){echo$requester_mobile;}?>" class="form-control"  name="req_mobile">
</div>
</div>
<div class="row">
<div class="col-sm-6">
Technician
<input type="text" name="req_tech" class="form-control">
</div>
<div class="col-sm-6">
Date
<input type="date" name="req_date" class="form-control">
</div>
</div>
<div class="form-group mt-3 float-right">
<input type="submit" class="btn btn-success" name="Assign" value="Assign">
<input type="reset" class="btn btn-secondary" name="" value="reset">
</div>
</form>
<?php
if(isset($msg)){
	echo"$msg";
}
?>
</div>
</div>

<?php
include_once('includes/footer.php');
?>