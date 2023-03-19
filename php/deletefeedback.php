<?php

include 'db.php';

session_start();
$id = $_GET["id"];

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

//  echo '<pre>';
//  var_dump($_FILES);
//  echo '</pre>';

$sql = "DELETE FROM review_table WHERE serviceid = $id;";
$query = mysqli_query($data, $sql);

header("Location: feedback.php?id=$id");
