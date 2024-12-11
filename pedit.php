<?php
session_start();



$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "hotel";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    $email = $_SESSION['email'];

  $sql = "SELECT * FROM user WHERE email = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); // Fetch the row
    $first_name = $row["firstname"];
    $phonenum = $row["phonenum"];
    $email = $row["email"];
    $last_Name = $row["lastname"];
    $nic=$row["nic"];
    
} 

if(isset($_POST['back']))
{
    header("Location: profile.php");
}

if(isset($_POST['update']))
{
$email = $_SESSION['email'];
$first_name = $_POST["first_name" ];
$last_Name = $_POST["last_Name"];
$nic = $_POST["nic"];
$phonenum = $_POST["phonenum"];

$sql = "UPDATE user SET firstname = ?, lastname = ?,  phonenum = ?, nic = ? WHERE email = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $first_name, $last_Name, $phonenum, $nic ,  $email);


if ($stmt->execute()) {
    echo "<html><head></head><body><script>
    alert ('Account Information updated');
    window.location.href = 'profile.php';
    </script>
    </body>
    </html>";
} 
else 
{
    echo "Error updating user data: " . $stmt->error;
}
}



}


$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
    <link rel="stylesheet" href="pedit.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Company Name</title>
        
</head>

<body>
    <div class="background-container"></div>
    
    <header>
        <img src="./images/logo.png" alt="Company Logo">
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
         <li><a href="booking.html">Booking</a></li>
         <li><button class="primarykey"><a href="ulog.html">log in</a></button></li>
         <li><button class="secondkey"><a href="reg.html">Register</a></button></li>
             

        </ul>
       

    </div> 

<div id="addimg">
<form method="post" action="pedit.php" class="editprofile">
<div class="profile-info">
      
      <div class="profile-field">
        
          <div class="profile-value" id="first-name"><b>First Name:</b> <input type="text" value="<?php echo $first_name; ?>" name="first_name"required> </div>
      
          <div class="profile-value" id="last-name"><b>Last Name: </b> <input type="text" value="<?php echo $last_Name; ?>" name="last_Name"required></div>
      
          <div class="profile-value" id="Phone number"><b>Phone number: </b>  <input type="text" value="<?php echo $phonenum ; ?>" name="phonenum"required></div>
      </div>
      <br>
      <div class="profile-field1">
    
          <div class="profile-value" id="Nic"> <b>Nic: </b> <input type="text" value="<?php echo $nic; ?>" name="nic"required></div>
     
          <div class="profile-value" id="email"><b>Email: </b><input type="text" value=" <?php echo $email; ?>" name="email"required></div>
      </div>

  </div>
  <div class="update">
  <button  id="edit" type="submit" name = "bac" >Back</button>
  <button  id="delete" type="submit" name = "update">Conform And save</button>
  </div>
</form>
</div>

  <!-- Footer !-->

  <div class="boxxx">
            
            <div class="divvv1">
                <h2 class="h22">Golden Jual</h2>
            </div>
            <div class="box">
                <img src="./images/facebook.png" class="i1">
                <img src="./images/insta.png" class="i2">
                <img src="./images/whatsapp.png" class="i3">
                
    
            </div>
            <div class="boxx">
                <p class="para">All right reserved goldenjual.com | <a href="#">Contact us</a> | <a href="#">Help</a></p>
            </div>
    
    
                
        </div>
        
    
        
        <!-- Rest of your webpage content goes here -->
    </body>
    </html>
    
