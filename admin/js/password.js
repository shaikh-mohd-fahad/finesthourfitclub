//yaha pr submiting button ka naam variable me store hai taki button dynamic ho jaaye or page ke according button ko set kr le
//jis page me humko is password file ka use karna hai us page pr hame pass_button naam ke variable ko define krna hoga

//this is used to count error in password or confirm password input field
error_count1=0;
error_count2=0;
error_count3=0;
var con_passwrod_check_time=0;
// confirmed password length start
function conPasswordLength(){
	con_pass_length=$("#con_password").val().length;
	if(con_pass_length<8 || con_pass_length>25){
		$("#wrong_pass2").text("**Passwords must be between 8 to 25 characters");
		error_count2=1;
		if(error_count1==0 && error_count2==0 && error_count3==0){
			$(pass_button).attr("disabled",false);
		}else{
			$(pass_button).attr("disabled",true);
		}
	}else{
		
		$("#wrong_pass2").text("");
		//$(pass_button).attr("disabled",false);
		con_passwrod_check_time+=1;
		check_pass();
		error_count2=0;
		if(error_count1==0 && error_count2==0 && error_count3==0){
			$(pass_button).attr("disabled",false);
		}else{
			$(pass_button).attr("disabled",true);
		}
	}
}
// confirmed password length end
//password length start
function passwordLenght(){
	var pass_length=$("#password").val().length;
	if(pass_length<8 || pass_length>25){
		$("#wrong_pass").text("**Passwords must be between 8 to 25 characters");
		error_count2=1;
		if(error_count1==0 && error_count2==0 && error_count3==0){
			$(pass_button).attr("disabled",false);
		}else{
			$(pass_button).attr("disabled",true);
		}
	}else{
		$("#wrong_pass").text("");
		if($("#con_password").val().length>0){
			check_pass();
		}
		error_count2=0;
		if(error_count1==0 && error_count2==0 && error_count3==0){
			$(pass_button).attr("disabled",false);
		}else{
			$(pass_button).attr("disabled",true);
		}
		if(con_passwrod_check_time>0){
			check_pass();
		}
	}
}
//password length end
//check passwrod and confirm password equality start
function check_pass(){
	password=$("#password").val();
	con_password=$("#con_password").val();
	if(password!=con_password){
		$("#wrong_pass").text("**Passwords are not matching");
		error_count3=1;
		if(error_count1==0 && error_count2==0 && error_count3==0){
			$(pass_button).attr("disabled",false);
		}else{
			$(pass_button).attr("disabled",true);
		}
	}else{
		$("#wrong_pass").text("");
		error_count3=0;
		if(error_count1==0 && error_count2==0 && error_count3==0){
			$(pass_button).attr("disabled",false);
		}else{
			$(pass_button).attr("disabled",true);
		}
	}
}
//check passwrod and confirm password equality end
$(document).ready(function(){
	$("#con_password").blur(function(){
		conPasswordLength();
	});
	$("#password").blur(function(){
		passwordLenght();
	});
});
//hide and show password
$("#hide_and_show_pass").click(function(){
	check_status=$("#hide_and_show_pass").is(":checked");
	if(check_status==true){
		//show password
		$("#password").attr("type","text");
	}
	else{
		//hide password
		$("#password").attr("type","password");
	}
});
//hide and show confirm password
$("#hide_and_show_con_pass").click(function(){
	check_status=$("#hide_and_show_con_pass").is(":checked");
	if(check_status==true){
		//show password
		$("#con_password").attr("type","text");
	}
	else{
		//hide password
		$("#con_password").attr("type","password");
	}
});