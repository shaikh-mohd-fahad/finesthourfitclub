<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
if(session_id()==''){
	session_start();
}
include_once("conn.php");
date_default_timezone_set('US/Eastern');
//submitting user data from index page
if(isset($_POST['form1_data']) and ($_POST['form1_data']=="submitted")){
	//echo"<script>alert('form btn server');</script>";
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$mobile_num=$_POST['mobile_num'];
	$dob=$_POST['dob'];
	
	$current_time=date('j M Y g:i:sa');//j for day, M for 3 words of Month, Y for 4 digit of year
	
	$q1="INSERT INTO `user` ( `firstname`, `lastname`, `email`, `dob`, `mobile_num`,`curr_time`) VALUES ( '$firstname', '$lastname', '$email', '$dob', '$mobile_num','$current_time')";
	$run1=mysqli_query($con,$q1);
	$_SESSION['user_id']=mysqli_insert_id($con);
	if($run1){
$email2="newmovies0620@gmail.com";
$message="<h2> Customer Detail</h2>Name: $firstname $lastname<br> Email: $email<br> DOB: $dob<br>Mobile number: $mobile_num<br>Time: $current_time";
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'testing@kb.forai.in';
$mail->Password = 'd@fa45fD';
$mail->setFrom('testing@kb.forai.in', 'Kick Boxing');
$mail->isHTML(true);
$mail->addAddress($email2);
$mail->Subject = "FHFC WebDeal: 7DayPass 01-OptIn";
$mail->Body = $message;
$mail->send();

echo"<script> location.href='slot_book.php';</script>";
	}else{
		echo"<span class='text-danger d-block' id='show_error'>**Submittion Failled</span>";
	}
}
/****** showing all appointment slot_book.php page start ********/
if(isset($_POST['appointment']) and $_POST['appointment']=='user_show_appointment'){
	$date=$_POST['date'];
	$q5="SELECT * FROM `slots` WHERE date='$date'" ;
	$run5=mysqli_query($con,$q5);
	if(mysqli_num_rows($run5)>=1){
		$msg="";
		$num=1;
		while($row5=mysqli_fetch_array($run5)){
			if($row5['booked_by']<3){
			$msg.="<button class='mt-2 btn btn-primary book_app' value='".$row5['id']."' id='slot_$num'>".$row5['start_date']."-".$row5['end_date']."</button> ";
			}
			$num++;
		}
		echo$msg;
	}else{
		$msg="<h5 class='text-danger'>No slots available</h5>";
		echo$msg;
	}
}
/****** showing all appointment slot_book.php page end ********/
/****** book button from slot_book.php page start ********/
if(isset($_POST['form_book_btn']) and $_POST['form_book_btn']=='booked_slot'){
	$slot_date=$_POST['slot_date'];
	$slot_time=$_POST['slot_time'];
	$_SESSION['slot_id']=$_POST['slot_id'];
	
	$user_id=$_SESSION['user_id'];
$q7="UPDATE `user` SET `select_date`='$slot_date',`select_time`='$slot_time', slot_id='{$_SESSION['slot_id']}' WHERE id='$user_id'";
	$run7=mysqli_query($con,$q7);
	if($run7){

$q8="select * from user where id='$user_id'";
$run8=mysqli_query($con,$q8);
$row8=mysqli_fetch_array($run8);
$firstname=$row8['firstname'];
$lastname=$row8['lastname'];
$email=$row8['email'];
$dob=$row8['dob'];
$mobile_num=$row8['mobile_num'];
$current_time=date('j M Y g:i:sa');
$email2="newmovies0620@gmail.com";
$message="<h2> Customer Appointment Detail</h2>Name: $firstname $lastname<br> Email: $email<br> DOB: $dob<br>Mobile number: $mobile_num<br>Time: $current_time<br>Appointment date:$slot_date and time:$slot_time";
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'testing@kb.forai.in';
$mail->Password = 'd@fa45fD';
$mail->setFrom('testing@kb.forai.in', 'Kick Boxing');
$mail->isHTML(true);
$mail->addAddress($email2);
$mail->Subject = "FHFC WebDeal: 7DayPass 02-SessionBooked";
$mail->Body = $message;
$mail->send();
		echo"<script> location.href='buy.php';</script>";
	}else{
		echo"<span class='text-danger'>**Something went wrong</span>";
	}
}
/****** book button from slot_book.php page end ********/
/****** buy button from buy.php page start ********/
if(isset($_POST['buyy']) and $_POST['buyy']=='buyy'){
$user_id=$_SESSION['user_id'];
$q8="select * from user where id='$user_id'";
$run8=mysqli_query($con,$q8);
$row8=mysqli_fetch_array($run8);
$firstname=$row8['firstname'];
$lastname=$row8['lastname'];
$email=$row8['email'];
$dob=$row8['dob'];
$mobile_num=$row8['mobile_num'];
$slot_date=$row8['select_date'];
$slot_time=$row8['select_time'];
$current_time=date('j M Y g:i:sa');
$user_choice="";
if($_POST['val']=="five"){
	$user_choice="Customer want to buy <b>sparring</b> of cost $59.99";
}else 
if($_POST['val']=="three"){
	$user_choice="Customer want to buy <b>Trainers</b> of cost $39.99";
}else{
	$user_choice="Customer chooses <b>No Gloves</b>";
}
$email2="newmovies0620@gmail.com";
$message="<h2> Customer Appointment Detail</h2>Name: $firstname $lastname<br>$user_choice<br> Email: $email<br> DOB: $dob<br>Mobile number: $mobile_num<br>Time: $current_time<br>Appointment date: $slot_date and time: $slot_time";
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'testing@kb.forai.in';
$mail->Password = 'd@fa45fD';
$mail->setFrom('testing@kb.forai.in', 'Kick Boxing');
$mail->isHTML(true);
$mail->addAddress($email2);
$mail->Subject = "FHFC WebDeal: 7DayPass 03-MerchSelected";
$mail->Body = $message;
$mail->send();
echo"<script> location.href='payment.php?val=".$_POST['val']."'</script>";
}
/****** book button from buy.php page end ********/
/****** buy button from payment.php page start ********/
if(isset($_POST['buyy2']) and $_POST['buyy2']=='buyy2'){
$user_id=$_SESSION['user_id'];
$q8="select * from user where id='$user_id'";
$run8=mysqli_query($con,$q8);
$row8=mysqli_fetch_array($run8);
$firstname=$row8['firstname'];
$lastname=$row8['lastname'];
$email=$row8['email'];
$dob=$row8['dob'];
$mobile_num=$row8['mobile_num'];
$slot_date=$row8['select_date'];
$slot_time=$row8['select_time'];
$current_time=date('j M Y g:i:sa');
$user_choice="";
$amount="";
if($_POST['val']=="five"){
	$user_choice="Customer want to buy <b>sparring</b> of cost $59.99";
	$amount="$59.99";
}else 
if($_POST['val']=="three"){
	$user_choice="Customer want to buy <b>Trainers</b> of cost $39.99";
	$amount="$39.99";
}else{
	$user_choice="Customer chooses <b>No Gloves</b>";
	$amount="$0";
}
$email2="newmovies0620@gmail.com";
$message="<h2> Customer Payment Detail</h2>
<h4> Amount Received: $amount</h4>
Name: $firstname $lastname<br>$user_choice<br> Email: $email<br> DOB: $dob<br>Mobile number: $mobile_num<br>Time: $current_time<br>Appointment date: $slot_date and time: $slot_time";
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'testing@kb.forai.in';
$mail->Password = 'd@fa45fD';
$mail->setFrom('testing@kb.forai.in', 'Kick Boxing');
$mail->isHTML(true);
$mail->addAddress($email2);
$mail->Subject = "FHFC WebDeal: 04-Payment Received";
$mail->Body = $message;
$mail->send();
}
/****** book button from payment.php page end ********/
/****** referral button from success.php page start ********/
if(isset($_POST['referral']) and $_POST['referral']=='referral'){
$ref_name=$_POST['name'];
$ref_email=$_POST['email'];
$ref_mobile_num=$_POST['mobile_num'];
$user_id=$_SESSION['user_id'];
$q8="select * from user where id='$user_id'";
$run8=mysqli_query($con,$q8);
$row8=mysqli_fetch_array($run8);
$firstname=$row8['firstname'];
$lastname=$row8['lastname'];
$email=$row8['email'];
$mobile_num=$row8['mobile_num'];
$current_time=date('j M Y g:i:sa');
$email2="newmovies0620@gmail.com";
$message="<h2> Referral Information</h2>
<h4>Referred by</h4>
Name: $firstname $lastname<br> Email: $email<br>Mobile number: $mobile_num<br>Time: $current_time<br><br>
<h4>Referred to</h4>
Name: $ref_name <br> Email: $ref_email<br> Mobile Number: $ref_mobile_num";
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'testing@kb.forai.in';
$mail->Password = 'd@fa45fD';
$mail->setFrom('testing@kb.forai.in', 'Kick Boxing');
$mail->isHTML(true);
$mail->addAddress($email2);
$mail->Subject = "FHFC WebDeal: 05-Referral Completed";
$mail->Body = $message;
$mail->send();
//sending msg to entered email
$message2="Hi this is $firstname $lastname and here is a link to the the cardio kickboxing place iLoveKickboxing in Whitehall near the Party City and Chick Fil-e. Want to go with me? Http://www.FinestHourFitClub.com/friends";
$mail2 = new PHPMailer;
$mail2->isSMTP();
$mail2->SMTPDebug = 0;
$mail2->Host = 'smtp.hostinger.com';
$mail2->Port = 587;
$mail2->SMTPAuth = true;
$mail2->Username = 'testing@kb.forai.in';
$mail2->Password = 'd@fa45fD';
$mail2->setFrom('testing@kb.forai.in', 'Kick Boxing');
$mail2->isHTML(true);
$mail2->addAddress($ref_email);
$mail2->Subject = "Referral Completed";
$mail2->Body = $message2;
if($mail2->send()){
	echo"<span class='text-success'>Message sent Successfully</span>";
}
else{
	echo"<span class='text-danger'>Message not sent </span>";
}
}
/****** referral button from success.php page end ********/
?>