<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Log In to GreenHand</title>
</head>
<body>
<div class="wrapper">
    <h2>Log In</h2>
    <form action="loginHandler.php" method="post" enctype="multipart/form-data">
        <div class="input-box">
            <input type="text" name="username" placeholder="Enter your Email" required>
        </div>
        <div class="input-box">
            <input type="password" name="pwd" placeholder="Enter your Password" required>
        </div>
        <div class="input-box button">
            <input type="submit" name="submit" value="Log In!">
        </div>
    </form>
    <div class="text">
        <h3><a href="#">Forgot your Password?</a></h3>
    </div>
    <div class="text">
        <h3>New around? <a href="../SignUp/SignUp.html">Sign Up!</a></h3>
    </div>
</div>
</body>
</html>