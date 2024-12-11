<?php
session_start();

$email = $_SESSION['email'];



$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "hotel";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
  $sql = "SELECT * FROM user WHERE email = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); // Fetch the row
    $firstname = $row["firstname"];
    $email = $row["email"];
    $lastname = $row["lastname"];
    $phonenum=$row["phonenum"];
    $nic=$row["nic"];
} 
else {
    echo "<html><head></head><body><script>
    alert ('Please log in');
    window.location.href = 'ulog.html';
    </script>
    </body>
    </html>";
    exit();
}


}
if(isset($_POST['submi']))
{
    session_destroy();
    $stmt->close();
    $conn->close();
    header("Location: home.html");
}


if(isset($_POST['update']))
{
  
    header("Location: pedit.php");
}

if(isset($_POST['card']))
{
    
$owner = $_SESSION['owner'];
    $sql = "SELECT * FROM pay_details WHERE owner = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $owner);
  $stmt->execute();
  $result = $stmt->get_result(); 

  if ($result->num_rows > 0)
  {

    header("Location: paye.php");
    exit(); 
  } 
  else 
  {
 
    echo "<html><head></head><body><script>
    alert('No Card found');
    window.location.href = 'profile.php';
    </script>
    </body>
    </html>";
    exit(); 
  }
   
}

if(isset($_POST['book']))
{
    $fullname =  $_SESSION['fullname'];
  $sql = "SELECT * FROM booking WHERE fullname = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $fullname);
  $stmt->execute();
  $result = $stmt->get_result(); 

  if ($result->num_rows > 0)
  {

    header("Location: bedit.php");
    exit(); 
  } 
  else 
  {
 
    echo "<html><head></head><body><script>
    alert('No Bookings found');
    window.location.href = 'profile.php';
    </script>
    </body>
    </html>";
    exit(); 
  }
}



$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="profile.css">
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

    <div class="hi">
        <form class="container" method="post" action="profile.php">
            <h1 class="welcome">Welcome ! <?php echo $firstname?></h1>
            <div class="infop">
            <img src="image/person.jpg" alt="" id="pPic">
            
            <p id="details"><?php echo $firstname; ?> <?php echo $lastname; ?> <br> <br><a href="#"><?php echo $email; ?></a></p></div>
            <button  id="logout" type="submit" name = "submi">log out</button>

            <h2>Account Details</h2><hr class="horizontal-line">
        
            <div class="profile-info">
              
                <div class="profile-field">
        
                    <div class="profile-value" id="name"><b>Name:</b>  <?php echo $firstname; ?></div>
                
                    <div class="profile-value" id="username"><b>User Name:</b> <?php echo $firstname  , $lastname; ?></div>
                
                    <div class="profile-value" id="nic/password"><b>NIC/Password:</b>  <?php echo $nic; ?></div>
                </div>
                <br>
                <div class="profile-field1">
                    <div class="profile-value" id="emailaddress"><b>Email Address:</b><?php echo $email; ?> </div>
              
                    <div class="profile-value" id="contactno"> <b>Contact No : </b> <?php echo $phonenum; ?></div>
               
                    
                </div>
        
            </div>
            <div class="update">
            <button  id="edit" type="submit" name = "update" >Edit Account Details</button>
            <button  id="card" type="submit" name = "card">Edit card Details</button>
            <button  id="card" type="submit" name = "book">View My Booking</button>
            </div>
            
        </form>
        </div>



<footer>
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
    
        
</footer>   





    
    <!-- Rest of your webpage content goes here -->
</body>
</html>
