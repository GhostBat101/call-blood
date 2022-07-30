function validateReg(pForm) {
	let flag = "";

	if (pForm.uname.value === "") {
		document.getElementById("unameErrorMsg").innerHTML = "Please fill up the username";
		flag = "Empty";
	}

	if (pForm.password.value === "") {
		document.getElementById("passwordErrorMsg").innerHTML = "Please fill up the password";
		flag = "Empty";
	}

	if (pForm.fname.value === "") {
		document.getElementById("fnameErrorMsg").innerHTML = "Please fill up the firstname";
		flag = "Empty";
	}

	if (pForm.lname.value === "") {
		document.getElementById("lnameErrorMsg").innerHTML = "Please fill up the lastname";
		flag = "Empty";
	}

	if (pForm.gender.value === null || pForm.gender.value === "") {
		document.getElementById("genderErrMsg").innerHTML = "Please choose a gender";
		flag = "Empty";
	}

	if (pForm.email.value === null || pForm.email.value === "" ) {
		document.getElementById("emailErrorMsg").innerHTML = "Please enter the email";
		flag = "Empty";
	}

	if (!pForm.role.value) {
		document.getElementById("roleErr").innerHTML = "Please choose a role";
		flag = "Empty";
	}

	if (flag === "") {
		return true;
	}
	return false;
}