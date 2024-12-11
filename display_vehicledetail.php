<?php

require 'config.php';

$sql="SELECT *FROM  vehicle_details";

$result=$con->query($sql);

if($result->num_row>0)
{
    while($row=$result->fetch_assoc())
    {
        echo "<h1>Owner detail:</h1>;"
        echo"<br><p>Customer Name:</p>".$row["Owner_name"];
        echo"<br><p>Customer Email:</p>".$row["Owner _email"];
        echo"<br><p>Customer Phone:</p>".$row["Owner_number"];
        echo"<br><p>Customer Address:</p>".$row["Owner_address"];

        echo "<h1>Vehicle Details:</h1>;"
        echo"<br><p>Vehicle Number:</p>".$row["Vehcle_number"];
        echo"<br><p>Fuel Type:</p>".$row["Vehicle_type"];
        echo"<br><p>Air Condition:</p>".$row["Air_cond"];
        echo"<br><p>Pumped Date:</p>".$row["Pumped_date"];
        echo"<br><p>Number of Ltr:</p>".$row["Litrs"];
    }


}
else
{
    echo"no result";
}

$con->close();



?>