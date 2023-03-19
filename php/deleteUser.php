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
$fullname = '';
$username = '';
$email = '';
$pwd = '';
$repeatpwd = '';
$usertype = '';


$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location : manageUser.php');
    exit;
}

// echo '<pre>';
// var_dump($id);
// echo '</pre>';

$sql = "DELETE FROM user WHERE id = ?;";
$statement = mysqli_stmt_init($data);
mysqli_stmt_prepare($statement, $sql);
mysqli_stmt_bind_param($statement, "s", $id);
mysqli_stmt_execute($statement);

// $statement = $pdo->prepare('DELETE FROM user WHERE user_id = :user_id');
// $statement->bindValue(':user_id', $user_id);
// $statement->execute();

header("Location: manageUser.php");
