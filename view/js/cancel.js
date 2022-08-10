function loadDoc() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("canceled").innerHTML = this.responseText;
  }
  xhttp.open("GET", "../controller/cancel.php");
  xhttp.send();
  setTimeout(function(){ window.location.href = '../view/request.php'; },5000);
  
}