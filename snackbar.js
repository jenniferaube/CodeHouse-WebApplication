<!--
File: snackbar.php
Created by: Jennifer Aube
Date: March 23, 2018
Last modified: March 31, 2018 by Jennifer Aube
snackbar function was taken from
-->
https://www.w3schools.com/howto/howto_js_snackbar.asp
function snackbar() {
    var snackbar = document.getElementById("snackbar")
    snackbar.className = "show";
    setTimeout(function(){ snackbar.className = snackbar.className.replace("show", ""); }, 3000);
}
function adduserAlert(){
    alert("User has been added");

}