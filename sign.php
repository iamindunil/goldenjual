<?php
     include 'connect.php';
     if(isset($_POST['submit'])){
        $firstname=$_POST['firstName'];
        $lastname=$_POST['lastName'];
        $gender=$_POST['gender'];
        $mobile=$_POST['mobileNumber'];
        $email=$_POST['email'];
        $bday=$_POST['birthday'];
        $pwd=$_POST['password'];
        $cnfpwd=$_POST['rePassword'];

        $sql="insert into payment_1 (firstName,lastName,gender,mobileNumber,email,birthday,password,rePassword)
        values ('$firstname','$lastname','$gender','$mobile','$email','$bday','$pwd',' $cnfpwd')";
        $result=mysqli_query($con,$sql);
        if($result){
            //echo "Data inserted successfully";
            header('location:display.php');
        }
        else{
            die(mysqli_error($con));
        }
        }
     
?>




<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="sign.css">
    <?php
           include 'header.php';
    ?>
        <title>
            Reverse Rental signup
        </title>
    </head>

<div>

<body>
<div class="form">
    <h1>SignUp Here!</h1>
    <form action="" method="POST" onsubmit="return checkPassword()" >
    
    First Name:<br/>
    <input type="text" name="firstname" placeholder="First Name" required><br/><br/>

    Last Name:<br/>
    <input type="text" name="lastname" placeholder="Last Name" required><br/><br/>

    Gender:<br/>
    <input type="radio" value="Male" name="gender">Male
    <input type="radio" value="Female" name="gender">Female<br/><br/>

    Mobile Number:<br/>
    <input type="phone" name="mobile" placeholder="0777777777" pattern="[0-9]{10}" required>
    <br/><br/>

    E-mail:<br/>
    <input type="email" name="email" placeholder="abc@gmail.com"
     pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" requiered><br/><br/>

     Birthday:<br/>
     <input type="date" name="bday" requiered><br/><br/>

     Password:<br/>
     <input type="password" id="pwd" placeholder="Use strong password" pattern="(?_.*\d)(?+.*[a-z])(?_.*[A-Z]).{5,10}"
     requiered><br/><br/>

     Re-enter Password:<br/>
     <input type="password" id="cnfpwd" placeholder="Re-enter password"requiered><br/><br/>
     
     <br>
     <input type="checkbox" id="checkbox" class="input style" onclick="enableButton()" >Accept privacy policy and terms
     <br/><br/>

     <center>
        <input type="submit" value="Submit" id="submitBtn" disabled>
        <p>Already have an account? <a href="login.php">Login</a></p>
     </center>
     </form>
</div>
</body>
</div>
</html>
