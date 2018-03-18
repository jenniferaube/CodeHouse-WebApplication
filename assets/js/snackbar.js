function snackbarFunction(){
    /*snackbar cited from https://www.w3schools.com/howto/howto_js_popup.asp*/
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 10000);
}