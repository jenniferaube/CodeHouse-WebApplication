function snackbarFunction(){
    /*snackbar cited from https://www.w3schools.com/howto/howto_js_popup.asp*/
    var snackbar = document.getElementById("snackbar")
    snackbar.className = "show";
    setTimeout(function(){ snackbar.className = snackbar.className.replace("show", ""); }, 10000);
}