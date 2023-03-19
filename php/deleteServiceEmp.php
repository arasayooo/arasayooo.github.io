<?php

$host = "127.0.0.1:3308";
$user = "root";
$password = "";
$db = "powerec";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die('connection error');
}

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

//  echo '<pre>';
//  var_dump($_FILES);
//  echo '</pre>';

$errors = [];

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location : manageService.php');
    exit;
}

// echo '<pre>';
// var_dump($id);
// echo '</pre>';

$sql = "DELETE FROM serviceemp WHERE serviceid = ?;";
$statement = mysqli_stmt_init($data);
mysqli_stmt_prepare($statement, $sql);
mysqli_stmt_bind_param($statement, "s", $id);
mysqli_stmt_execute($statement);

// $statement = $pdo->prepare('DELETE FROM user WHERE user_id = :user_id');
// $statement->bindValue(':user_id', $user_id);
// $statement->execute();

header("Location: manageService.php?type=2");