function loadDoc() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("appointment").innerHTML = this.responseText;
  }
  xhttp.open("GET", "../controller/appointAction.php");
  xhttp.send();
}