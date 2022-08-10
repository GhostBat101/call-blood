function validateReq(pForm) {
	let flag = "";

	if (pForm.firstname.value === "") {
		document.getElementById("firstnameErrMsg").innerHTML = "Firstname can't be empty";
		flag = "Empty";
	}

	if (pForm.lastname.value === "") {
		document.getElementById("lastnameErrMsg").innerHTML = "Lastname can't be empty";
		flag = "Empty";
	}

	if (pForm.gender.value === null || pForm.gender.value === "") {
		document.getElementById("genderErrMsg").innerHTML = "Please choose a gender";
		flag = "Empty";
	}
	if (!pForm.blood.value) {
		document.getElementById("bloodErr").innerHTML = "Please choose a blood group";
		flag = "Empty";
	}

	if (flag === "") {
		return true;
	}
	return false;
}