<?php

require("adcon.php");
if(isset($_POST['submit']))
    {
        
        $admincemail=$_POST['adminemail'];
        $adminpassword=$_POST['adminpassword'];

        $sql = "SELECT * FROM admin_login WHERE admin_email = ? AND admin_password = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $admincemail, $adminpassword);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            
            echo "<script>alert('Log in Complete'); window.location.href = 'adminp.php';</script>";
           
            exit();
        } else {
            // Invalid username or password
            echo "<script>alert('Invalid user'); window.location.href = 'ulog.html';</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="adminlog.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Golden Jual</title>
        
</head>

<body>
    <div class="background-container"></div>

    <header>
        <img src="image/logo.png" alt="Company Logo">
        <h1>Goldenjual.com</h1>
        <div class="search-bar">
            <input type="text" class="search-input" placeholder="Search...">
        </div>
    </header>

    <div class="navi">
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="event.html">Event</a></li>
            <li><a href="gallery.html">Gallery</a></li>
            <li><a href="about.html">About us</a></li>
            <li><a href="contactus.html">Contact us</a></li>
            <li><a href="help.html">Help & Support</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="booking.html">Booking</a></li>
            <li><button class="primarykey"><a href="ulog.html">log in</a></button></li>
            <li><button class="secondkey"><a href="reg.html">Register</a></button></li>


        </ul>


    </div>
   <form action="adminlog.php" method="post">
    <p>
        <div id="container">
            <h1>Admin Login</h1>
            
                <label for="email">Email:</label>
                <input type="email" id="email" name="adminemail" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="adminpassword" required>

                <input type="submit" value="Login" name="submit">

                <div class="forgot-password">
                    <a href="#">Forgot Password?</a>
                </div>

                <div class="signup-link">
                    Don't have an account? <a href="./adminp.php">Sign up</a>
                </div>
            
        </div>
    </p>
    </form>







    <div class="boxxx">

        <div class="divvv1">
            <h2 class="h22">Golden Jual</h2>
        </div>
        <div class="box">
            <img src="./facebook.png" class="i1">
            <img src="./insta.png" class="i2">
            <img src="./whatsapp.png" class="i3">


        </div>
        <div class="boxx">
            <p class="para">All right reserved goldenjual.com | <a href="#">Contact us</a> | <a href="#">Help</a></p>
        </div>



    </div>









    <!-- Rest of your webpage content goes here -->
</body>
</html>
