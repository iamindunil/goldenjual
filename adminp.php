<?php
session_start();


    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "hotel";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error ');
    } 
    else

    {

    $sql = "SELECT * FROM user";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    }

$stmt->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Golden Jual</title>
    <!-- css -->
    <link rel="stylesheet" href="adminp.css">
    <script src="admin.js"></script>
</head>
<body>
    <!-- Start Header -->
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
    <!-- End Header -->



    <!-- Start Admin -->
    <section class="admin">

        <div class="title">
            <h1> Welcome Admin!</h1>
        
        <div class="title">
        </div>
        <div class="dashbord">
            <div class="dashbord-container">
                <span>
                    <h3></h3>
                    <h5>New Booking</h5>
                </span>
                <span>
                    <h3></h3>
                    <h5>availabal hall</h5>
                </span>
                <span>
                    <h3></h3>
                    <h5>Total Inquaries</h5>
                </span>
            </div>
        </div>


    </section>
      
    
    <h1><em><strong>Details of Users</strong></em></h1>
    <div class="table">
     <table>
       <thead>
         <tr>
           <th>First Name</th>
           <th>Last Name</th>
           <th>Phone Number</th>
           <th>Email</th>
           <th>Nic</th>
           
         </tr>
       </thead>
       <tbody>
         <?php
         // Loop through the database results and generate table rows
         while ($row = $result->fetch_assoc()) {
           echo "<tr>";
           echo "<td>" . htmlspecialchars($row['firstname']) . "</td>";
           echo "<td>" . htmlspecialchars($row['lastname']) . "</td>";
           echo "<td>" . htmlspecialchars($row['phonenum']) . "</td>";
           echo "<td>" . htmlspecialchars($row['email']) . "</td>";
           echo "<td>" . htmlspecialchars($row['nic']) . "</td>";
           echo "</tr>";
         }
         ?>
       </tbody>
     </table>
    </div>



<div class="userac">
    <div class="userslist">
        <h3>User Accounts</h3>
        
            <p></p>

        

    </div>




</div> 
    <!-- End Admin -->





    <!-- Start footer --><div class="boxxx">
            
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
    

    <!-- JavaScript -->
    
</body>
</html>