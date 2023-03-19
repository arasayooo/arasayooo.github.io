<?php

include 'db.php';

$errors = [];

function loginUser($data, $username, $pwd)
{
    $Exist = exist($data, $username, $username);

    if ($Exist === false) {
        
    }

    $pwdHashed = $Exist['password'];
    $checkpwd = password_verify($pwd, $pwdHashed);

    if ($checkpwd === false) {
        $errors[] = "Wrong password!";
        header("Location: ../html/login.php?error=login");
    } elseif ($checkpwd === true) {
        session_start();
        if ($Exist['usertype'] === "user") {
            $_SESSION['id'] = session_id();
            $_SESSION["id"] = $Exist["id"];
            $_SESSION["username"] = $Exist["username"];
            $_SESSION["usertype"] = $Exist["usertype"];
            header("Location:../html/aftercustomer.php");
        } else if ($Exist['usertype'] === "admin") {
            $_SESSION["id"] = $Exist["id"];
            $_SESSION["username"] = $Exist["username"];
            $_SESSION["usertype"] = $Exist["usertype"];
            header("Location:manageUser.php");
        } else if ($Exist['usertype'] === "employee1") {
            $_SESSION["id"] = $Exist["id"];
            $_SESSION["username"] = $Exist["username"];
            $_SESSION["usertype"] = $Exist["usertype"];
            header("Location:../html/after.php");
        } else if ($Exist['usertype'] === "employee2") {
            $_SESSION["id"] = $Exist["id"];
            $_SESSION["username"] = $Exist["username"];
            $_SESSION["usertype"] = $Exist["usertype"];
            header("Location:manageUser.php");
        } else if ($Exist['usertype'] === "employee3") {
            $_SESSION["id"] = $Exist["id"];
            $_SESSION["username"] = $Exist["username"];
            $_SESSION["usertype"] = $Exist["usertype"];
            header("Location:manageUser.php");
        } else if ($Exist['usertype'] === "employee4") {
            $_SESSION["id"] = $Exist["id"];
            $_SESSION["username"] = $Exist["username"];
            $_SESSION["usertype"] = $Exist["usertype"];
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
    //  if(empty($errors))
    //  {
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
//      $sql ="SELECT * from user WHERE (username='".$username."' OR email= '".$email."') AND password= '".$pwd."'";

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