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
$password = '';
$repeatpwd = '';
$usertype = 'user';


function create($data, $fullname, $username, $email, $password)
{
   $sql = "INSERT INTO user (Fullname, username, email, password) VALUES (?,?,?,?);";
   $statement = mysqli_stmt_init($data);
   if (!mysqli_stmt_prepare($statement, $sql)) {
      echo "error betul";
      exit();
   }

   $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
   mysqli_stmt_bind_param($statement, "ssss", $fullname, $username, $email, $hashedpwd);
   mysqli_stmt_execute($statement);
   mysqli_stmt_close($statement);
   header("Location:min.php");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $fullname = $_POST['fullname'];
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['pwd'];
   $repeatpwd = $_POST['pwdrepeat'];

   // if (!$fullname) {
   //    $errors[] = "fullname is required";
   // }

   // if (!$username) {
   //    $errors[] = "username is required";
   // }

   // if (!$email) {
   //    $errors[] = "Email is required";
   // }

   // if (!$password) {
   //    $errors[] = "password is required";
   // }

   // if (!$repeatpwd) {
   //    $errors[] = " re-enter your password is required";
   // }

   if (!preg_match("/^[a-zA-Z0-9- ']*$/", $username)) {
      $errors[] = "invalid username";
   }

   if (!preg_match("/^[a-zA-Z- ']*$/", $fullname)) {
      $errors[] = "invalid fullname";
   }

   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "invalid email";
   }

   if ($password !== $repeatpwd) {
      $errors[] = "password not match";
   }

   if (exist($data, $username, $email) !== false) {
      $errors[] = "username or email already exist";
   }

   if (empty($errors)) {

      create($data, $fullname, $username, $email, $password);
   }
}

//    $statement = $pdo->prepare("INSERT INTO login (fullname, username, email, password, repeatpwd)
//     VALUES:fullname, :username, :email, :password, :repeatpwd");

//     $statement->bindValue(':fullname', $fullname);
//     $statement->bindValue(':username', $username);
//     $statement->bindValue(':email', $email);
//     $statement->bindValue(':password', $password);
//     $statement->bindValue(':repeatpwd', $repeatpwd);
//     $statement->execute();
//     header('Location: login.php');
//     //redirect user to index php


function exist($data, $username, $email)
{
   $sql = "SELECT * FROM user WHERE username = ? OR email = ?;";
   $statement = mysqli_stmt_init($data);
   if (!mysqli_stmt_prepare($statement, $sql)) {
      echo "error";
   }
   mysqli_stmt_bind_param($statement, "ss", $username, $email);
   mysqli_stmt_execute($statement);

   $resultData = mysqli_stmt_get_result($statement);

   if ($row = mysqli_fetch_assoc($resultData)) {
      return $row;
   } else {
      $result = false;
      return $result;
   }
   mysqli_stmt_close($statement);
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registration</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <link rel="stylesheet" href="../css/contact.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<header>
   <?php if (!empty($errors)) { ?>
      <div class="alert alert-danger" style="width: 1000px;">
         <?php foreach ($errors as $error) { ?>
            <div><?php echo $error ?></div>
         <?php } ?>
      </div>
   <?php } ?>
</header>

<body>

   <div class="backbutton">
      <a href="../html/index.html">
         <button class="back"><i class="fa fa-angle-left" aria-hidden="true"></i></button></a>
   </div>
   <div class="container">
      <h1 style="color: orange;">Sign Up</h1>
      <form action="min.php" method="post">
         <div class="form-contact">
            <input type="text" class="form-control" placeholder="Full name" name="fullname" required>
         </div>
         <div class="form-contact-right">
            <input type="text" class="form-control" placeholder="Email" name="email" required>
         </div>
         <div class="form-contact">
            <input type="text" class="form-control" placeholder="Username" name="username" required>
         </div>
         <div class="form-contact-right">
            <input type="password" class="form-control" placeholder="password" name="pwd" required>
         </div>
         <br>
         <div class="form-contact-right">
            <input type="password" class="form-control" placeholder="re-enter password" name="pwdrepeat" required>
         </div>
         <button type="submit" class="sendbutton">Sign Up</button>
      </form>
      <div class="info">
         <h1 style="color: black;">Info</h1>
         <p>60 Jalan Sena 1, Taman Rinting, Masai</p>
         <p>81750 Johor Bahru</p>
         <p>Johor, Malaysia</p>
         <p>07-386 3448</p>
         <p>powerec@email.com</p>
      </div>
   </div>
   <script src="../javascript/contact.js"></script>
</body>

</html>