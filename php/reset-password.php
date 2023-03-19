<?php

if (isset($_POST["reset-submit"])) {
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];

    if (empty($password) || empty($passwordRepeat)) {
        header("Location: create-new-password.php");
        exit();
    } else if ($password != $passwordRepeat) {
        header("Location: create-new-password.php?newpwd=pwdnotsame");
        exit();
    }
    $currentDate = date("U");
    require 'db.php';

    $sql = "SELECT * pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >=?;";
    $stmt = mysqli_stmt_init($data);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error !";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            echo "You need to re-submit your reset request.";
            exit();
        } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck - password_verify($tokenBin, $row["pwdResetToken"]);

            if ($tokenCheck === false) {
                echo "You need to re-submit your reset request.";
                exit();
            } elseif ($tokenCheck === true) {
                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT *FROM users WHERE emailUsers=?;";
                $stmt = mysqli_stmt_init($data);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "There was an error !";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "errororororo.";
                        exit();
                    } else {
                        $sql = "UPDATE login SET password=? WHERE email=?";
                        $stmt = mysqli_stmt_init($data);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an error !";
                            exit();
                        } else {
                            $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);
                            // header("Location: ../login.php?newPwd=passwordUpdated");

                            $sql = "DELETE pwdReset WHERE pwdResetEmail=?";
                            $stmt = mysqli_stmt_init($data);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "There was an error !";
                                exit();
                            } else {
                                $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: ../login.php?newPwd=passwordDELETED");
                            }
                        }
                    }
                }
            }
        }
    }
} else {
}
