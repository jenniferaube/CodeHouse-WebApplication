$(function () {
    if (document.referrer.includes("login")) {
        $("#mapIcon").after('<li class=""><a class="icon" onclick="goBack()"><img src="assets/img/back.png"></a></li>');
    }
});

function goBack() {
    window.history.back();
}

function goForward() {
    window.history.forward();
}