<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="description" content="Beem Competition "/>
<meta name="keywords" content="Competition, Beem, API, Beemathon"/>
<meta name="author" content="Murtada Rashid"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="style.css"> 
<title>COVID REGISTRATION</title>
</head>
<body>
	<div class="main">
		<h1  id = "text1" class="fill">Please Fill in this form for COVID VACINNATION</h1>
		<form id="form" method="post" action = "process.php">
			<fieldset>
				<legend><h1 class="form">Personal Details</h1></legend>
				<div class="fdetails">
					<label for="Name"> Full-Name:* </label><input  type="text" id="name" name="name" placeholder="User Name "  /><br/><br/><br/>
					<label for="fdob"> Date Of Birth:* </label><input id="fdob" name="fdob" type="date" /><br/><br/><br/>


					<label for="age"> Age:* </label><input id="age" name="age" type="Number" placeholder="40" /><br/><br/><br/>
				
					<label for="fphone"> Phone Number :*  +255 </label><input id="fphone" name="fphone" type="text" placeholder="example: 756001040" /><br/><br/><br/>

					<label for="disease"> Any Underlying Conditions:* </label>
						<select name="disease" id="disease" >
						<option value="Yes">YES</option>
						<option value="No">NO</option>
						</select>
					<br/><br/><br/>
					
				</div>
			</fieldset>
			<fieldset id="buttons">
					<input class="fbutton" type="submit" id="submit" value="Post Enquiry"/>
					<input class="fbutton" type="reset" value="Reset"/>
				</fieldset>
				</form>
				
			</div>
	<!--footer-->	
 <footer>	
	<div class="footer-bottom">
		<p>All Rights Reserved &#169;</p>
	</div>
	</footer>
</body>
</html>

<script>
	$(document).ready(function(){
		gErrorMsg = "";
		$('#submit').click(function(){
			"use strict";
			var isAllOK = true;
			var fnameOK =  chkName();
			var fdobOK = chkDob();
			var ageOK = chkAge();
			var phoneOK = chkPhoneNumber();
			var diseaseOK = chkDisease();

			var Check= fnameOK && fdobOK && ageOK && phoneOK && diseaseOK;
			if (!Check) {
				isAllOK = false;
				alert(gErrorMsg);
				gErrorMsg ="";
			}
			return isAllOK;
		});
		
	});
	function chkName(){
	var name = $('#name').val();
	var pattern = /^[a-zA-Z ]+$/ ;
	var nameOk = true;
	if (name == ""){ 
		gErrorMsg += "Please Fill in Your Name\n";
		nameOk = false; 
	}
	else{
		if (!pattern.test(name)){
			gErrorMsg += "Your Name must only contain alpha characters\n";
			nameOk = false; 
		}
	}
	return nameOk;

	};
	function chkDob(){
	var dobOK = true;
	var date =  $('#fdob').val();
	if(date ==""){
		dobOK = false;
		gErrorMsg += "Please Fill in your Birth Date\n";
	}
	return dobOK;
	};
	function chkAge(){
		var AgeOK = true;
	var age =  $('#age').val();
	if(age ==""){
		AgeOK = false;
		gErrorMsg += "Please Fill in your Age\n";
	}
	return AgeOK;
	};
	function chkPhoneNumber(){
	var phoneOK= true;
	var number = '255' + $('#fphone').val();
	var pattern = /^[0-9]+$/;
	if (!pattern.test(number) || number.length<9 || number.length>15 ){
		gErrorMsg = gErrorMsg + "Your Phone Number must contain numerical digits only \n";
		phoneOK = false;
	}
	else if (number.charAt(0)== 0){
		number = number.substring(1,number.length);
	}
	return phoneOK;
	};
	function chkDisease(){
	var diseaseOK = true;
	var disease =  $('#disease').val();
	if(disease ==""){
		diseaseOK = false;
		gErrorMsg += "Please Check your disease status\n";
	}
	return diseaseOK;
	};
</script>
