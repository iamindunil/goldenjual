<?php
session_start();

$email = $_SESSION['email'];

if (isset($_POST['submit']))
{
    $rating = $_POST["rating" ];
    $message = $_POST["message"];

    
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "hotel";
    
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    
    if ($conn->connect_error) {
        die("connection error");
    } 
    else 
    {
    $sql = "insert into rate (rate,message,email)values(?,?,?)";
    $statement=$conn->prepare($sql);
    
    $statement -> bind_param("sss",$rating,$message,$email);
    $statement->execute();
    }
    echo "<html><head></head><body><script>
    alert ('Thanks for your feedback!');
    window.location.href = 'home.html';
    </script>
    </body>
    </html>";
    $conn->close();
}

?>