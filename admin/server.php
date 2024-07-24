<?php
if(session_id()==''){
	session_start();
}
include_once("conn.php");
/*******************  login.php page start ****************/
// checking login detail to login.php page start
if(isset($_POST['form_admin_login_submit']) and $_POST['form_admin_login_submit']=='login'){
	$email=$_POST['email'];
	$password=$_POST['password'];
	//checking email existance
	$q2="select * from admin where email='$email'";
	$run2=mysqli_query($con,$q2);
	if(mysqli_num_rows($run2)==1){
			$q16="select * from admin where email='$email' and password='$password'";
			$run16=mysqli_query($con,$q16);
			if($row16=mysqli_num_rows($run16)==1){
				$row16=mysqli_fetch_array($run2);
				setCookie("admin_id",$row16['id'],time()+60*60*24*365);
				$_SESSION['admin_id']=$row16['id'];
				$msg="<script> location.href='index.php';</script>";
				echo$msg;
			}else{
				$msg="<span class='text-danger float-right'>**Wrong Email or Password</span>";
				echo$msg;
			}
		
	}else{
		$msg="<span class='text-danger float-end'>**Email not Exist </span>";
		echo$msg;
	}
}
// login admin end
/*******************  login.php page end ****************/


/****** slot booking index.php page start ********/
if(isset($_POST['slot_book']) and $_POST['slot_book']=='booked'){
	$start=$_POST['start'];
	$end=$_POST['end'];
	$slot_date=$_POST['slot_date'];
	$q4="INSERT INTO `slots` ( `date`, `start_date`, `end_date`) VALUES ( '$slot_date', '$start', '$end')";
	$run4=mysqli_query($con,$q4);
	if($run4){
		$msg="<span class='text-success float-right'>Slot Added Successfully</span>";
				echo$msg;
	}
	else{
		$msg="<span class='text-danger float-right'>Slot not Added</span>";
				echo$msg;
	}
}
/****** slot booking index.php page end ********/


/****** showing all appointment index.php page start ********/
if(isset($_POST['appointment']) and $_POST['appointment']=='show_appointment'){
	$date=$_POST['date'];
	$q5="SELECT * FROM `slots` WHERE date='$date'";
	$run5=mysqli_query($con,$q5);
	if(mysqli_num_rows($run5)>=1){
		$msg="<h3>Available slots for $date are</h3>";
		while($row5=mysqli_fetch_array($run5)){
			$msg.="<button class='mt-2 btn btn-primary'>".$row5['start_date']."-".$row5['end_date']."</button> ";
		}
		echo$msg;
	}else{
		$msg="<h3 class='text-danger'>No slots available slots for $date</h3>";
		echo$msg;
	}
}
/****** showing all appointment index.php page end ********/
?>