<?php

$students = array(
    "uthpala" => 80,
    "meena" => 92,
    "abdhul" => 85,
    "sahan" => 50,
    "teena" => 65
);

foreach ($students as $name => $mark) {
   
    if ($mark < 60) {
        echo "<br>Try harder" . $name .", you got" . $mark . "marks and you Fail the module.<br>";
    } else if ($mark < 70) {
        echo "<br>Congratulations " . $name . ", you got " . $mark . " and your grade is D <br>";
    } else if ($mark < 80) {
        echo "<br>Congratulations " . $name . ", you got " . $mark . " and your grade is C <br>";
    } else if ($mark < 90) {
        echo "<br>Congratulations " . $name . ", you got " . $mark . " and your grade is B <br>";
    } else if ($mark < 100) {
        echo "<br>Congratulations " . $name . ", you got " . $mark . " and your grade is A <br>";
    }
}  

?>