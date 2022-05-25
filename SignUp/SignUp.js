function redirect() {
    document.querySelector('body').style.opacity = 0
    setTimeout(function() {
        //window.location.href = "../signuporgs/signuporgs.html";
        if (document.getElementById("myToggle").checked){
            document.getElementById("type-of-user").innerHTML="for Organizations";
            document.getElementById("age-div").parentNode.removeChild(document.getElementById("age-div"));
            document.getElementById("gender-div").parentNode.removeChild(document.getElementById("gender-div"));
            document.getElementById("name-field").placeholder="Enter Organization's Name";
            document.getElementById("email-field").placeholder="Enter Organization's Email";
            document.getElementById("country-field").placeholder="Enter Organization's Country";
            document.getElementById("city-field").placeholder="Enter Organization's City/Town";
            document.getElementById("phone-field").placeholder="Enter Organization's Phone Number";
        }
        else{
            window.location.href="SignUp.html";
        }
        document.querySelector('body').style.opacity = "1";
    }, 500)
}