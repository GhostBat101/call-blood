function wait(ms){
   var start = new Date().getTime();
   var end = start;
   while(end < start + ms) {
     end = new Date().getTime();
  }
}
response ="hello";
function check(pForm) {
	flag = "";

	if (pForm.username.value === "") {
		document.getElementById("unameErrorMsg").innerHTML = "Username can't be empty";
		flag = "Empty";
	}
	if (pForm.firstname.value === "") {
		document.getElementById("fnameErrorMsg").innerHTML = "Firstname can't be empty";
		flag = "Empty";
	}
	if (pForm.lastname.value === "") {
		document.getElementById("lnameErrorMsg").innerHTML = "Lastname can't be empty";
		flag = "Empty";
	}
	if (pForm.email.value === "" || pForm.email.value === null) {
		document.getElementById("emailErrorMsg").innerHTML = "Email can't be empty";
		flag = "Empty";
	}
	if (pForm.gender.value === "" || pForm.gender.value === null) {
		document.getElementById("genderErrMsg").innerHTML = "<br>Gender can't be empty";
		flag = "Empty";
	}
	if (pForm.role.value === "" || pForm.role.value === null) {
		document.getElementById("roleErr").innerHTML = "<br>Role can't be empty";
		flag = "Empty";
	}
	if (flag === "") {
		document.getElementById("status").innerHTML = "<br>Please wait, checking if the information provided there matches with the database";
		const url = "username="+pForm.username.value+"&firstname="+pForm.firstname.value+"&lastname="+pForm.lastname.value+"&email="+pForm.email.value+"&gender="+pForm.gender.value+"&role="+pForm.role.value;
		const xhttp = new XMLHttpRequest();
  		xhttp.onload = function() {
    		document.getElementById("status").innerHTML = this.responseText;
  		}
  		xhttp.open("POST", "../controller/forgotAction.php");
  		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  		xhttp.send(url);
  		wait(3000);
  		window.location.href = '../view/forgot.php';
	}
	return false;
}