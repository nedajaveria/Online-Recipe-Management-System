<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "recipe"
);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

?>