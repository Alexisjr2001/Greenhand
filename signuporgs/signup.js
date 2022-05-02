function redirect() {
    document.querySelector('body').style.opacity = 0
    setTimeout(function() { 
        window.location.href = "../signupvols/signupvols.html";
    }, 500)
}