<?php

if (isset($_POST['submit']))
{
    $firstname = $_POST["firstname" ];
    $lastName = $_POST["lastname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $nic = $_POST["nic"];
    
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
    $sql = "insert into user (firstname,lastname,password,phonenum,email , nic)values(?,?,?,?,?,?)";
    $statement=$conn->prepare($sql);
    
    $statement -> bind_param("ssssss",$firstname,$lastName,$password,$phone,$email,$nic);
    $statement->execute();
    }
    echo "<html><head></head><body><script>
    alert ('Register complete');
    window.location.href = 'ulog.html';
    </script>
    </body>
    </html>";
    $conn->close();
}

?>


