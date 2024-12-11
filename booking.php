<?php

session_start();

if (isset($_POST['submit'])) {

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
    $fav_language = $_POST["fav_language"] ;

    $_SESSION['fullname'] =  $fullname;
 
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "hotel";
    
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    
    if ($conn->connect_error) {
        die("Connection error: " . $conn->connect_error);
    } else {
        $sql = "INSERT INTO booking (fullname, email, phone_number, check_in, check_out, no_of_guests, nic, adults, children, hall_type, event, fav_language) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $statement = $conn->prepare($sql);
    
        $statement->bind_param("ssssssssssss", $fullname, $email, $phone_number, $check_in, $check_out, $no_of_guests, $nic, $adults, $children, $hall_type, $event, $fav_language);
        $statement->execute();
    }
    echo "<html><head></head><body><script>
    alert ('Your Booking is Complete !...');
    window.location.href = 'pay.html';
    </script>
    </body>
    </html>";
    
    $conn->close();
}
?>






