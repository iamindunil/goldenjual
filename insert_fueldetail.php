<?php

require 'config.php';

$Fual=$_POST["F_type"];
$vehicle=["V_num"];
$A_con=["Air"];

$sql="INSERT INTO vehicle_details(Fual,vehicle,A_con)VALUES($Fual,$vehicle,$A_con)";
if($con->query($sql))
{
    echo"Insert successfully";
}
else
{
    echo"Error:".$con->error;
}
$con->close();
























?>