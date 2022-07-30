function validate(pForm) {
	let flag = "";

	if (pForm.uname.value === "") {
		document.getElementById("unameErrorMsg").innerHTML = "Please fill up the username";
		flag = "Empty";
	}

	if (pForm.password.value === "") {
		document.getElementById("passwordErrorMsg").innerHTML = "Please fill up the password";
		flag = "Empty";
	}

	if (flag === "") {
		return true;
	}
	return false;
}