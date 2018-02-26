function idleTimer() {
    var t;
    //window.onload = resetTimer;
    window.onmousemove = resetTimer; // catches mouse movements
    window.onmousedown = resetTimer; // catches mouse movements
    window.onclick = resetTimer;     // catches mouse clicks
    window.onscroll = resetTimer;    // catches scrolling
    window.onkeypress = resetTimer;  //catches keyboard actions

    function logout() {
        window.location.href = '/logout';  //Adapt to actual logout script
    }

   

	function resetTimer() {
		clearTimeout(t);
		t = setTimeout(logout, 60000);  // time is in milliseconds (1000 is 1 second)
    }
	
}
function tohome() {
          window.location = './index.html';  //Navigates to home page
   }
function afterlogout(){
		setTimeout(tohome, 10000);  // time is in milliseconds (1000 is 1 second)
	}
idleTimer();