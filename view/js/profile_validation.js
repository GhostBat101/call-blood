function validatePro(pForm) {
    flag = "";

    if (pForm.firstname.value == "") {
        document.getElementById("fnameErrMsg").innerHTML = "Please fill up the firstname";
        flag = "Empty";
    }
    if (pForm.lastname.value == "") {
        document.getElementById("lnameErrMsg").innerHTML = "Please fill up the lastname";
        flag = "Empty";
    }
    if (pForm.email.value == "" || pForm.email.value == null) {
        document.getElementById("emailErrMsg").innerHTML = "Please fill up the email";
        flag = "Empty";
    }

    if (flag == ""){
        return true;
    }
    
    return false;
}