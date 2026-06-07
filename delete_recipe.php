<?php

include 'db.php';

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM recipes WHERE id=$id");

header("Location:view_recipes.php");

?>