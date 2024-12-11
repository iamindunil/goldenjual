<?php
session_start();

if(isset($_POST['submit'])) {
    
    $email = $_POST["email"];
    $password = $_POST["password"];
    $_SESSION['email'] = $email;

        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "hotel";

        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        } else {
            $sql = "SELECT * FROM user WHERE email = ? AND password = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Valid username and password
                echo "<script>alert('Log in Complete'); window.location.href = 'home.html';</script>";
                header("Location: home.html");
                exit();
            } else {
                // Invalid username or password
                echo "<script>alert('Invalid user'); window.location.href = 'ulog.html';</script>";
            }

            $stmt->close();
            $conn->close();
        }
    }

?>