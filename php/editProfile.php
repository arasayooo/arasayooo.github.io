<?php

include 'db.php';

$errors = [];
$fullname = '';
$username = '';
$email = '';
$password = '';
$usertype = '';
$image = '';
$id = $_GET['id'];

function randomString($n)
{
   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $str = '';
   for ($i = 0; $i < $n; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $str .= $characters[$index];
   }
   return $str;
}

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

$sql2 = "SELECT * FROM user WHERE id=$id;";
$result = mysqli_query($data, $sql2);
$row = mysqli_fetch_assoc($result);

$fullname = $row['Fullname'];
$username = $row['username'];
$email = $row['email'];
$password = $row['password'];
$usertype = $row['usertype'];
$image = $row['image'];

if (isset($_POST['update'])) {
   $fullname = $_POST['fullname'];
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password2 = $_POST['password'];

   if (!preg_match("/^[a-zA-Z0-9- ']*$/", $username)) {
      $errors[] = "invalid username";
   }

   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "invalid email";
   }

   if (exist($data, $username, $email) !== false) {
      $errors[] = "username or email already exist";
   }

   $hashedpwd = password_hash($password2, PASSWORD_DEFAULT);

   $sql = "UPDATE user SET username='$username', Fullname='$fullname', email='$email', password='$hashedpwd' WHERE id='$id';";
   $query = mysqli_query($data, $sql);
   if ($query) {
      echo "Data is updated";
   } else {
      echo "Data is not updated";
   }
   mysqli_close($data);
   header("Location:../html/after.php");
}

?>

<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <header>
      <?php include '../html/headerafterlogin.php'; ?>
   </header>
   <link rel="stylesheet" href="../css/editProfile.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <title>Profile</title>
</head>

<body>
   <div class="backbutton">
      <a href="../html/after.php">
         <button class="back"><i class="fa fa-angle-left" aria-hidden="true"></i></button></a>
   </div>

   <!--=======Light/Dark theme button=======-->
   <div class="theme-btn flex-center">
      <i class="fas fa-moon" style="margin-top: 15px;"></i>
      <i class="fas fa-sun" style="margin-top: 15px;"></i>
   </div>

   <?php if (!empty($errors)) { ?>
      <div class="alert alert-danger">
         <?php foreach ($errors as $error) { ?>
            <div><?php echo $error ?></div>
         <?php } ?>
      </div>
   <?php } ?>

   <div class="container">
      <br>
      <h1>Edit Profile</h1>
      <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
         <div class="upload">
            <?php
            $name = $row["Fullname"];
            $image = $row["image"];
            ?>
            <img src="images/<?php echo $image; ?>" width=390 height=390 title="<?php echo $image; ?>">
            <div class="round"><input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
               <i class="fa fa-camera" style="color: #fff;"></i>
            </div>
         </div>
      </form>
      <form class="input-login" action="" id="login" method="post">
         <div class="form-control">
            <input name="fullname" type="text" value="<?php echo $fullname ?>">
            <label class="em">Full name</label>
         </div>
         <div class="form-control">
            <input name="username" type="text" value="<?php echo $username ?>">
            <label class="em">Username</label>
         </div>
         <div class="form-control">
            <input name="email" type="text" value="<?php echo $email ?>">
            <label class="em">Email Address</label>
         </div>
         <div class="form-control">
            <input name="password" type="password">
            <label class="em">Password</label>
         </div>
         <button type="submit" name="update" class="btn">Update</button>
      </form>
   </div>

   <script>
      //Website dark/light theme
      const themeBtn = document.querySelector(".theme-btn");

      themeBtn.addEventListener("click", () => {
         document.body.classList.toggle("dark-theme");
         themeBtn.classList.toggle("sun");

         localStorage.setItem("saved-theme", getCurrentTheme());
         localStorage.setItem("saved-icon", getCurrentIcon());
      });

      const getCurrentTheme = () => document.body.classList.contains("dark-theme") ? "dark" : "light";
      const getCurrentIcon = () => themeBtn.classList.contains("sun") ? "sun" : "moon";

      const savedTheme = localStorage.getItem("saved-theme");
      const savedIcon = localStorage.getItem("saved-icon");

      if (savedTheme) {
         document.body.classList[savedTheme === "dark" ? "add" : "remove"]("dark-theme");
         themeBtn.classList[savedIcon === "sun" ? "add" : "remove"]("sun");
      }
   </script>
   <script src="js/swiper-bundle.min.js"></script>
   <script type="text/javascript">
      document.getElementById("image").onchange = function() {
         document.getElementById("form").submit();
      };
   </script>
   <?php
   if (isset($_FILES["image"]["name"])) {
      $id = $_GET["id"];

      $imageName = $_FILES["image"]["name"];
      $imageSize = $_FILES["image"]["size"];
      $tmpName = $_FILES["image"]["tmp_name"];

      // Image validation
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));
      if (!in_array($imageExtension, $validImageExtension)) {
         echo
         "
        <script>
          alert('Invalid Image Extension');
          document.location.href = 'editProfile.php?id=$id';
        </script>
        ";
      } elseif ($imageSize > 120000000) {
         echo
         "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = 'editProfile.php?id=$id';
        </script>
        ";
      } else {
         $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
         $newImageName .= '.' . $imageExtension;
         $query = "UPDATE user SET image = '$newImageName' WHERE id = $id";
         mysqli_query($data, $query);
         move_uploaded_file($tmpName, 'images/' . $newImageName);
         echo
         "
        <script>
        document.location.href = 'editProfile.php?id=$id';
        </script>
        ";
      }
   }
   ?>

</body>

</html>