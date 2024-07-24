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
<div class="container-fluid py-3 bg-color shadow">

<h4 class="text-center">One Last Thing...</h4>
<center><span style="font-size:12px">Get your Gear!</span></center>
<div class="text-center container " style="font-size:12px">
Quality Boxing/Sparring Gloves Are Require For All Classes.<br>
A good pair of hand wraps are also highly encouraged.<br>
While outside gloves are permitted, they must be inspected and approved by our staff. For your safety we do not permit dirty, damaged, worn out, or 'economy' gloves such as ones made with injection-foam. If bringing your own gloves, please be prepared to buy a set of gloves at the studio Pro Shop if yours are not approved.<br>
Beginners typically start with 10-12oz gloves and then advance to 14-18oz gloves after a few months. Heavier gloves = more calories burned!
</div>
</div>

<div class="container my-5">
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow">
          <div class="card-header py-3">
            <h1 class="my-0 fw-normal">Trainers</h1>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mt-3 mb-4">
              <li>12-Oz Gloves</li>
              <li>color: Pink or Black</li>
              <li>PHOTOS</li>
              <li>$60 Value</li>
              <li><h1 class="card-title pricing-card-title text-success">+$39.99</h1>
            </li>
			<li class="text-danger">+Free Hand Wraps!</li>
            </ul>
            <button type="button" value="three" class="w-100 btn btn-lg btn-outline-primary shadow buyy">Buy</button>
          </div>
        </div>
      </div>
	  <div class="col">
        <div class="card mb-4 rounded-3 shadow">
          <div class="card-header py-3">
            <h1 class="my-0 fw-normal">Sparring</h1>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mt-3 mb-4">
              <li>16-Oz Gloves</li>
              <li>Your Choice of Design</li>
              <li>PHOTOS</li>
              <li>$100 - $125 Value</li>
              <li><h1 class="card-title pricing-card-title  text-success">+$59.99</h1>
            </li>
			<li class="text-danger">+Free Hand Wraps!</li>
            </ul>
            <button type="button" value="five" class="w-100 btn btn-lg btn-outline-primary  buyy">Buy</button>
          </div>
        </div>
      </div>
	  <div class="col">
        <div class="card mb-4 rounded-3 shadow">
          <div class="card-header py-3">
            <h1 class="my-0 fw-normal">No Gloves</h1>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mt-3 mb-4">
              <li>Bringing Your Own</li>
              <li>Gloves For Approval</li>
              <li>PHOTOS</li>
              <li>Or Buy At Studio</li>
              <li><h1 class="card-title pricing-card-title text-success">+$0.00</h1>
            </li>
			<li class="invisible">hdf</li>
            </ul>
            <button type="button" value="free" class="w-100 btn btn-lg btn-outline-primary  buyy">Free</a>
          </div>
        </div>
      </div>
	  <span id="show_error9"> </span>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function(){
	//submiting all data to server
	$(".buyy").on("click",function(e){
		value=$(this).val();
		dataa={buyy:"buyy",val:value};
		$.ajax({
			url:"server.php",
			type:"post",
			data:dataa,
			beforeSend:function(){
			    $(this).html("<div class='spinner-border text-light' role='status'><span class='visually-hidden'>Loading...</span></div>");
			},
			success:function(response9){
			$("#show_error9").html(response9);
			}
		});
	});
});
</script>
</body>	
</html>