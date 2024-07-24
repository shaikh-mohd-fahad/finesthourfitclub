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

<li class="nav-item "> <a href="index.php" class="nav-link" > Dashboard</a></li>
<li class="nav-item "> <a href="user_det.php" class="nav-link active" > User Detail </a></li>
<li class="nav-item"> <a href="logout.php" class="nav-link">Logout</a></li>

</ul>
</div><!-- col-md-2 ended -->
<div class="col-md-10">


<div class="container mt-3">
<h2 class="text-center">User Detail</h2>
<?php 
	  $q4="SELECT * FROM `user` ORDER by id DESC";
	  $run4=mysqli_query($con,$q4);
	  $row_num4=mysqli_num_rows($run4);
		if($row_num4>0){
?>

 <div class="table-responsive">
 <small>Detail is showing for new to old</small>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>S. No.</th>
          <th>Username</th>
          <th>Email</th>
          <th>DOB</th>
          <th>Mobile Number</th>
          <th>Slot Date</th>
          <th>Slot Time</th>
          <th>Amount (in $)</th>
          <th>Amount Paid Status</th>
        </tr>
      </thead>
      <tbody>
	  
		<?php 
		while($row4=mysqli_fetch_array($run4)){
			?>
        <tr>
          <td><?php echo$row4['id']; ?></td>
		  
          <td><?php echo$row4['firstname']." ".$row4['lastname']; ?></td>
		  <td><?php echo$row4['email']; ?></td>
		  <td><?php echo$row4['dob']; ?></td>
		  <td><?php echo$row4['mobile_num']; ?></td>
		  <td><?php echo$row4['select_date']; ?></td>
		  <td><?php echo$row4['select_time']; ?></td>
		  <td><?php echo$row4['amount']; ?></td>
		  <td><?php 
		  if($row4['amount_status']=="Success"){
		  echo"<span class='text-success'><b>".$row4['amount_status']."</b></span>"; 
		  }else{
			  echo"<span class='text-danger'><b>".$row4['amount_status']."</b></span>";
		  }
		  ?>
		  </td>
        </tr>
		<?php }?>
      </tbody>
    </table>
  </div>
<?php }
		
		else{
			echo"<span class='text-danger'><b>Table is Empty</b></span>";
		}
?>
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
	
});
</script>
</body>	
</html>