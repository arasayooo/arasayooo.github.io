<?php



$host = "127.0.0.1:3308";
$user = "root";
$password = "";
$db = "powerec";

$data = mysqli_connect($host, $user, $password, $db);

$errors[] = '';

function loginUser($data, $username, $pwd)
{
   $Exist = exist($data, $username, $username);

   if ($Exist === false) {
      $errors[] = 'Wrong username';
   }
   // $sql ="SELECT * from login WHERE password = '".$pwd."'";

   $pwdHashed = $Exist['password'];
   $checkpwd = password_verify($pwd, $pwdHashed);

   if ($checkpwd === false) {
      // $errors[] = "wrong password";
      // header("Location:../html/index.html");
      // exit();
      $errors[] = 'Wrong password';
   } elseif ($checkpwd === true) {
      if ($Exist['usertype'] === "user") {
         $_SESSION["id"] = $Exist["id"];
         $_SESSION["username"] = $Exist["username"];
         header("Location:register.php");
      } else if ($Exist['usertype'] === "admin") {
         session_start();
         $_SESSION["id"] = $Exist["id"];
         $_SESSION["username"] = $Exist["username"];
         header("Location:manageUser.php");
      } else if ($Exist['usertype'] === "employee1") {
         session_start();
         $_SESSION["id"] = $Exist["id"];
         $_SESSION["username"] = $Exist["username"];
         header("Location:manageUser.php");
      } else if ($Exist['usertype'] === "employee2") {
         session_start();
         $_SESSION["id"] = $Exist["id"];
         $_SESSION["username"] = $Exist["username"];
         header("Location:manageUser.php");
      } else if ($Exist['usertype'] === "employee3") {
         session_start();
         $_SESSION["id"] = $Exist["id"];
         $_SESSION["username"] = $Exist["username"];
         header("Location:manageUser.php");
      } else if ($Exist['usertype'] === "employee4") {
         session_start();
         $_SESSION["id"] = $Exist["id"];
         $_SESSION["username"] = $Exist["username"];
         header("Location:manageUser.php");
      }
   }
}
if ($data === false) {
   die('connection error');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $username = $_POST['username'];
   $pwd = $_POST['pwd'];
   if (empty($errors)) {
      loginUser($data, $username, $pwd);
   }
   // $result = $pdo->prepare($sql);
   // $result->exceute();
   // $user = $result->fetch();

   // if(password_verify($pwd,$user['password']))
   // {
   //     echo "successful";
   // }
   // else
   // {
   //     echo "wrong password";
   // }
   //      $sql ="SELECT * from login WHERE (username='".$username."' OR email= '".$email."') AND password= '".$pwd."'";

   //     $result=mysqli_query($data,$sql);
   //     $row=mysqli_fetch_assoc($result);

   //      $pwdhash= $row['password'];
   //      $checkpwd = password_verify($pwdhash,$pwd);
   //      if($row !== null && $checkpwd === true)
   //     {

   //     if($row !== null && $row['usertype']== 'user')
   //     {
   //         header("Location:../html/gallery.html");
   //     }
   //       elseif($row !== null && $row['usertype']== 'admin')
   //     {
   //         header("Location:manageUser.php");
   //     } 
   //     else {
   //         echo "incorrect";
   //         exit();
   //     }
   // }
   // }


}
function exist($data, $username, $email)
{
   $sql = "SELECT * FROM user WHERE username = ? OR email =?;";
   $statement = mysqli_stmt_init($data);
   if (!mysqli_stmt_prepare($statement, $sql)) {
      echo "error";
      exit();
   }
   mysqli_stmt_bind_param($statement, "ss", $username,   $email);
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
   <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
   <!-- <link rel="stylesheet" href="../css/login.css"> -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
   
   <?php if (!empty($errors)) { ?>
      <!-- <div class="alert alert-dismissible alert-danger"> -->
         <?php foreach ($errors as $error) { ?>
            <p><?php echo $error ?></p>
            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> -->
         <?php } ?>
      <!-- </div> -->
   <?php } ?>
   
   <div class="backbutton">
      <a href="index.html">
         <button class="back"><a href="../html/index.html"><i class="fa fa-angle-left" aria-hidden="true"></i></button></a>
   </div>
   <div class="container">
      <h1 style="color: orange;">Login</h1>
      <form action="#" method="POST">
         <div class="form-control">
            <input type="text" name="username" required>
            <label class="em">username</label>
         </div>

         <div class="form-control">
            <input type="password" name="pwd" required>
            <label class="pass">password</label>
         </div>

         <button class="btn">Login</button>
         <p class="text">Don't have an account? <a href="register.php">Register</a></p>

      </form>
   </div>
   <script src="../javascript/login.js"></script>
</body>

</html>