function help(pForm) {
	let flag = "";

	if (pForm.heading.value === "") {
		document.getElementById("headERR").innerHTML = "Heading is Empty";
		flag = "Empty";
	}

	if (pForm.body.value === "") {
		document.getElementById("bodyErr").innerHTML = "Text body is Empty";
		flag = "Empty";
	}

	if (flag === "") {
		const url = "heading="+pForm.heading.value+"&body="+pForm.body.value;
		const xhttp = new XMLHttpRequest();
  		xhttp.onload = function() {
    		document.getElementById("helpmsg").innerHTML = this.responseText;
  		}
  		xhttp.open("POST", "../controller/helpAction.php");
  		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  		xhttp.send(url);
	}
	return false;
}