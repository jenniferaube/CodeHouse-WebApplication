<!--
File: snackbar.js
Created by: Jennifer Aube
Date: March 10, 2018
Last modified: March 19, 2018 by Jennifer Aube
-->
function snackbarFunction(){
    /*snackbar cited from https://www.w3schools.com/howto/howto_js_popup.asp*/
    var snackbar = document.getElementById("snackbar")
    snackbar.className = "show";
    setTimeout(function(){ snackbar.className = snackbar.className.replace("show", ""); }, 10000);
}