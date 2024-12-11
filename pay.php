<?php

session_start();

if (isset($_POST['submit'])) {

    $owner = $_POST["owner" ];
    $CVV = $_POST["CVV"];
    $card_num = $_POST["card_num"];
    $month = $_POST["month"];
    $year = $_POST["year"];

    $_SESSION['owner'] =  $owner;
 
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "hotel";
    
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    
    if ($conn->connect_error) {
        die("Connection error: " . $conn->connect_error);
    } else {
        $sql = "INSERT INTO pay_details (owner, CVV, card_num, month, year) VALUES (?,?,?,?,?)";
        $statement = $conn->prepare($sql);
    
        $statement->bind_param("sssss", $owner, $CVV, $card_num, $month, $year);
        $statement->execute();
    }
    echo "<html><head></head><body><script>
    alert ('Your Payment is Complete !...');
    window.location.href = 'home.html';
    </script>
    </body>
    </html>";
    
    $conn->close();
}
?>






