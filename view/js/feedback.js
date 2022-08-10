function validatefd(pForm) {
	let flag = "";

	if (pForm.heading.value === "") {
		document.getElementById("headingErr").innerHTML = "Please fill up the heading";
		flag = "Empty";
	}

	if (pForm.body.value === "") {
		document.getElementById("bodyErr").innerHTML = "Please fill up the body";
		flag = "Empty";
	}

	if (flag === "") {
		return true;
	}
	return false;
}

