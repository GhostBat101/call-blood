function validatePro(pForm) {
	let flag = "";

	if (pForm.uname.value === "") {
		document.getElementById("unameErrorMsg").innerHTML = "Username can't be empty";
		flag = "Empty";
	}

	if (pForm.fname.value === "") {
		document.getElementById("fnameErrorMsg").innerHTML = "Firstname can't be empty";
		flag = "Empty";
	}

	if (pForm.lname.value === "") {
		document.getElementById("lnameErrorMsg").innerHTML = "Lastname can't be empty";
		flag = "Empty";
	}


	if (pForm.email.value === null || pForm.email.value === "" ) {
		document.getElementById("emailErrMsg").innerHTML = "Email can't be empty";
		flag = "Empty";
	}
	 if (pForm.npass.value != pForm.cpass.value) {
	 	document.getElementById("cpassErrMsg").innerHTML = "Please confirm the password again";
		flag = "Empty";
	 }

	if (pForm.opass.value === "") {
		if (pForm.npass.value != "") {
			document.getElementById("oldErrMsg").innerHTML = "Please type the old password to update the password";
			flag = "Empty";
		}
	}

	if (flag === "") {
		return true;
	}
	return false;
}