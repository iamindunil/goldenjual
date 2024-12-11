<?php
session_start();

$owner = $_SESSION['owner'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "hotel";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
    $sql = "SELECT * FROM pay_details WHERE owner = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $owner);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $owner = $row["owner"];
        $CVV = $row["CVV"];
        $card_num = $row["card_num"];
        $month = $row["month"];
        $year = $row["year"];
    }

    if (isset($_POST['delete'])) {
        $sql = "DELETE  FROM pay_details  WHERE owner = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $owner);
        $stmt->execute();
        echo "<script>alert('Delete Complete'); window.location.href = 'home.html';</script>";
        
    }

    if (isset($_POST['submit'])) {
        $owner1 = $owner;
        $owner = $_POST["owner"];
        $CVV = $_POST["CVV"];
        $card_num = $_POST["card_num"];
        $month = $_POST["month"];
        $year = $_POST["year"];
        $sql = "UPDATE pay_details SET owner = ?, CVV = ?, card_num = ?, month = ?, year = ? WHERE owner = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $owner, $CVV, $card_num, $month, $year, $owner1);
        $stmt->execute();
    }
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="pay.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Company Name</title>
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

    <form method="post" action="paye.php">
        <div class="head">
            <div class="container">
                <h1>Payment</h1>
                <div class="first-row">
                    <div class="owner">
                        <h3>Owner</h3>
                        <div class="input-field">
                            <input type="text" name="owner" value="<?php echo $owner; ?>">
                        </div>
                    </div>
                    <div class="cvv">
                        <h3>CVV</h3>
                        <div class="input-field">
                            <input type="text" name="CVV" value="<?php echo $CVV; ?>">
                        </div>
                    </div>
                </div>
                <div class="second-row">
                    <div class="card-number">
                        <h3>Card Number</h3>
                        <div class="input-field">
                            <input type="text" name="card_num" value="<?php echo $card_num; ?>">
                        </div>
                    </div>
                </div>
                <div class="third-row">
                    <h3>Card Exp</h3>
                    <div class="selection">
                        <div class="date">
                            <select name="month" id="months">
                            <option selected disabled><?php echo $month; ?>"</option>
                                <option value="Jan">Jan</option>
                                <option value="Feb">Feb</option>
                                <option value="Mar">Mar</option>
                                <option value="Apr">Apr</option>
                                <option value="May">May</option>
                                <option value="Jun">Jun</option>
                                <option value="Jul">Jul</option>
                                <option value="Aug">Aug</option>
                                <option value="Sep">Sep</option>
                                <option value="Oct">Oct</option>
                                <option value="Nov">Nov</option>
                                <option value="Dec">Dec</option>
                            </select>
                            <select name="year" id="years">
                            <option selected disabled><?php echo $year; ?>"</option>
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                            </select>
                        </div>
                        <div class="cards">
                            <img src="mc.png" alt="">
                            <img src="vi.png" alt="">
                            <img src="pp.png" alt="">
                        </div>
                    </div>
                </div>
                <input type="submit" value="Save And Update" name="submit">
                <input type="submit" value="Delete card details" name="delete">
            </div>
        </div>
    </form>

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
    <!-- Rest of your webpage content goes here -->
</body>
</html>
