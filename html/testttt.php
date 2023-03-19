<?php

include '../php/db.php';

$errors = [];
$fullname = '';
$username = '';
$email = '';
$password = '';
$repeatpwd = '';
$usertype = 'user';

function create($data, $fullname, $username, $email, $password, $imagePath)
{
   $sql = "INSERT INTO user (Fullname, username, email, password, image) VALUES (?,?,?,?,?);";
   $statement = mysqli_stmt_init($data);
   if (!mysqli_stmt_prepare($statement, $sql)) {
      echo "error betul";
      exit();
   }

   $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
   mysqli_stmt_bind_param($statement, "sssss", $fullname, $username, $email, $hashedpwd, $imagePath);
   mysqli_stmt_execute($statement);
   mysqli_stmt_close($statement);
   header("Location:../html/login.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $fullname = $_POST['fullname'];
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['pwd'];
   $repeatpwd = $_POST['pwdrepeat'];

   if (!$fullname) {
      $errors[] = "fullname is required";
   }

   if (!$username) {
      $errors[] = "username is required";
   }

   if (!$email) {
      $errors[] = "Email is required";
   }

   if (!$password) {
      $errors[] = "password is required";
   }

   if (!$repeatpwd) {
      $errors[] = " re-enter your password is required";
   }

   if (!preg_match("/^[a-zA-Z0-9- ']*$/", $username)) {
      $errors[] = "Invalid username (cannot contain symbols)";
      // header("Location: ../html/login.php?error=register1");
   }

   if (!preg_match("/^[a-zA-Z- ']*$/", $fullname)) {
      $errors[] = "Invalid fullname (cannot contain numbers)";
      // header("Location: ../html/login.php?error=register2");
   }

   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Invalid email, use the correct email format";
      // header("Location: ../html/login.php?error=register3");
   }

   if ($password !== $repeatpwd) {
      $errors[] = "Password does not match";
      // header("Location: ../html/login.php?error=register4");
   }

   if (exist($data, $username, $email) !== false) {
      $errors[] = "Username or email already exist";
      // header("Location: ../html/login.php?error=register5");
   }

   $imagePath = file_get_contents("images/pfp.png");

   if (empty($errors)) {
      create($data, $fullname, $username, $email, $password, $imagePath);
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
   <title>Login</title>
   <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->

   <!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
   <link rel="stylesheet" href="../css/login.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<?php if (!empty($errors)) { ?>
   <div class="alert">
      <?php foreach ($errors as $a) {
         echo $a;
         echo '<br>';
      } ?>
   </div>
<?php } ?>

<?php if (isset($_GET["error"])) { ?>
   <div class="alert">
      <?php if ($_GET["error"] == "login") {
         echo "<p>Wrong password or username!</p>";
      } ?>
   </div>
<?php } ?>


<body>
   <div class="backbutton">
      <a href="index.php">
         <button class="back"><i class="fa fa-angle-left" aria-hidden="true"></i></button></a>
   </div>
   <div class="container">
      <div class="button-box">
         <div id="button"></div>
         <button type="button" class="toggle-btn" onclick="login()">Login</button>
         <button type="button" class="toggle-btn" onclick="register()">Register</button>
      </div>

      <form class="input-login" id="login" action="../php/login.php" method="post">
         <div class="form-control">
            <input name="username" type="text" required>
            <label class="em">Username</label>
         </div>
         <div class="form-control">
            <input name="pwd" type="password" required>
            <label class="pass">Password</label>
         </div>
         <button type="submit" class="btn">Login</button>
         <a href="../php/reset.php">Forgot password?</a>
      </form>
      <form class="input-register" id="register" action="login.php" method="post">
         <div class="form-control">
            <input name="username" type="text" maxlength="11" required>
            <label class="em">Username</label>
            <p style="font-size: 70%; left: 140px; top: 30px; position: absolute; color: orange;">*Maximum 11 characters</p>
         </div>
         <div class="form-control">
            <input name="fullname" type="text" required>
            <label class="pass">Fullname</label>
         </div>
         <div class="form-control">
            <input name="email" type="text" required>
            <label class="pass">Email</label>
         </div>
         <div class="form-control">
            <input name="pwd" type="password" required>
            <label class="pass">Password</label>
         </div>
         <div class="form-control">
            <input name="pwdrepeat" type="password" required>
            <label class="pass">Re-enter Password</label>
         </div>
         <button type="submit" class="btn">Register</button>
      </form>
   </div>
   <script src="../javascript/login.js"></script>
   <script>
      var x = document.getElementById("login");
      var y = document.getElementById("register");
      var z = document.getElementById("button");

      function register() {
         x.style.left = "-400px";
         y.style.left = "50px";
         z.style.left = "110px";
      }

      function login() {
         x.style.left = "50px";
         y.style.left = "450px";
         z.style.left = "0px";
      }
   </script>
</body>

</html>