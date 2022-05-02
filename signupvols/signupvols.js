function redirect() {
    document.querySelector('body').style.opacity = 0
    setTimeout(function() { 
        window.location.href = "../signuporgs/signuporgs.html";
    }, 500)
}