<?php
session_start();

$fullname =  $_SESSION['fullname'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "hotel";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{

  $sql = "SELECT * FROM booking WHERE fullname = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $fullname);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); // Fetch the row

    $fullname = $row["fullname" ];
    $email = $row["email"];
    $phone_number = $row["phone_number"];
    $check_in = $row["check_in"];
    $check_out = $row["check_out"];
    $no_of_guests = $row["no_of_guests"];
    $nic = $row["nic"];
    $adults = $row["adults"];
    $children =  $row["children"] ;
    $hall_type =  $row["hall_type"];
    $event =  $row["event"] ;

    
} 

else{
    echo "<html><head></head><body><script>
    alert ('No bookings Found');
    window.location.href = 'profile.php';
    </script>
    </body>
    </html>";
}


if(isset($_POST['back']))
{
    header("Location: profile.php");
}


if(isset($_POST['update']))
{
    $fullname1=$fullname;

    $fullname = $_POST["fullname" ];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $check_in = $_POST["check_in"];
    $check_out = $_POST["check_out"];
    $no_of_guests = $_POST["no_of_guests"];
    $nic = $_POST["nic"];
    $adults = $_POST["adults"];
    $children =  $_POST["children"] ;
    $hall_type =  $_POST["hall_type"];
    $event =  $_POST["event"] ;

    $_SESSION['fullname'] =  $fullname;

$sql = "UPDATE booking SET fullname = ?, email = ?, phone_number = ?, check_in = ?, check_out = ? , no_of_guests = ? , nic = ? , adults = ? , children = ? , hall_type = ? ,  event = ?   WHERE fullname = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssss", $fullname, $email, $phone_number, $check_in, $check_out, $no_of_guests, $nic, $adults, $children, $hall_type, $event,  $fullname1);


if ($stmt->execute()) {
    echo "<html><head></head><body><script>
    alert ('Account Information updated');
    window.location.href = 'profile.php';
    </script>
    </body>
    </html>";
} 

}

if(isset($_POST['delete']))
{
        $sql="DELETE  FROM booking WHERE fullname = ?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("s",$fullname);
        $stmt->execute();
        echo "<html><head></head><body><script>
        alert ('Booking was Deleted');
        window.location.href = 'profile.php';
        </script>
        </body>
        </html>";
}

}


$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="booking.css">
    <link rel="stylesheet" type="text/css" href="styleall.css">
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
            <li><a href="booking.php">Booking</a></li>
            <li><button class="primarykey"><a href="ulog.html">log in</a></button></li>
            <li><button class="secondkey"><a href="reg.html">Register</a></button></li>
                


        </ul>


    </div>

    <!-- reservation -->

    <section class="reservation" id="reservation">

        <h1 class="heading">Edit My Booking</h1>

        <form action="bedit.php" method="post">

            <div class="container">

                <div class="box">
                    <p>Full name <span></span></p>
                    <input type="text" class="input"  name="fullname"value="<?php echo $fullname; ?>">
                </div>

                <div class="box">
                    <p>email <span></span></p>
                    <input type="text" class="input" name="email" value="<?php echo $email; ?>" name="email">
                </div>

                <div class="box">
                    <p>check in <span></span></p>
                    <input type="date" class="input" name="check_in"  value="<?php echo $check_in; ?>">
                </div>

                <div class="box">
                    <p>check out <span></span></p>
                    <input type="date" class="input" name="check_out" value="<?php echo $check_out; ?>">
                </div>

                <div class="box">
                    <p>Phone Number<span></span></p>
                    <input type="text" class="input"  name="phone_number" value="<?php echo $phone_number; ?>">
                </div>

                <div class="box">
                    <p>No of guests<span></span></p>
                    <input type="text" class="input" name="no_of_guests" value=" <?php echo $no_of_guests; ?>" >
                </div>

                <div class="box">
                    <p>NIC/Passport Number<span></span></p>
                    <input type="text" class="input" placeholder="NIC/Passport Number" name="nic" value="<?php echo $nic; ?>" name="nic">
                </div>

                <div class="box">
                    <p>adults <span></span></p>
                    <select  class="input" name="adults">
                        <option selected disabled><?php echo $adults; ?>"</option>
                        <option value="100">100 adults</option>
                        <option value="150">150 adults</option>
                        <option value="200">250 adults</option>
                        <option value="300">300 adults</option>
                        <option value="400">400 adults</option>
                        <option value="600">600 adults</option>
                        <option value="More than 600">Morn than 600 adults</option>
                    </select>
                </div>

                <div class="box">
                    <p>children <span></span></p>
                    <select  class="input" name="children">
                        <option selected disabled><?php echo $children; ?>"</option>
                        <option value="25">25 child</option>
                        <option value="50">50 child</option>
                        <option value="75">75 child</option>
                        <option value="100">100 child</option>
                        <option value="200">200 child</option>
                        <option value="300">300 child</option>
                        <option value="More than 300">More than 300 child</option>
                    </select>
                </div>

                <div class="box">
                    <p>Hall Type <span></span></p>
                    <select  class="input" name="hall_type">
                        <option selected disabled><?php echo $hall_type; ?>"</option>
                        <option value="1">Golden Glitz(Max 100)</option>
                        <option value="2">Radiant Goldwing(Max 300)</option>
                        <option value="3">Golden Majesty(Max 500)</option>
                        <option value="4">Golden Eligance(Max 1000)</option>

                    </select>
                </div>

                <div class="box">
                    <p>Event <span></span></p>
                    <select class="input" name="event">
                    <option selected disabled><?php echo $event; ?>"</option>
                        <option value="1">Event</option>
                        <option value="2">Wedding</option>
                        <option value="3">Conference and Meeting</option>
                        <option value="4">Anniversary paties</option>
                        <option value="5">Product Launches</option>
                    </select>
                </div>

    

            </div>



            </div>

            <center> </div>
  <div class="update">
  <button  class="btn" type="submit" name = "back" >Back</button>
  <button  class="btn" type="submit" name = "update">Conform And save</button>
  <button  class="btn" type="submit" name = "delete">Delete My booking</button>
  </div></center>

        </form>

    </section>








    <div class="Footer">

        <div class="divvv1">
            <h2 class="h22">Golden Jual</h2>
        </div>
        <div class="Icon">
            <img src="./facebook.png" class="i1">
            <img src="./insta.png" class="i2">
            <img src="./whatsapp.png" class="i3">


        </div>
        <div class="boxx">
            <p class="para">All right reserved goldenjual.com | <a href="#">Contact us</a> | <a href="#">Help</a></p>
        </div>



    </div>
</body>
</html>
