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

function create($data, $fullname, $username, $email, $pwd, $usertype, $imagePath)
{
    $sql = "INSERT INTO user (Fullname, username, email, password, usertype, image) VALUES (?,?,?,?,?,?);";
    $statement = mysqli_stmt_init($data);
    if (!mysqli_stmt_prepare($statement, $sql)) {
        echo "error betul";
        exit();
    }

    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($statement, "ssssss", $fullname, $username, $email, $hashedpwd, $usertype, $imagePath);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("Location:manageUser.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $repeatpwd = $_POST['repeatpwd'];
    $usertype = $_POST['usertype'];

    if (!$fullname) {
        $errors[] = "fullname is required";
    }

    if (!$username) {
        $errors[] = "username is required";
    }

    if (!$email) {
        $errors[] = "Email is required";
    }

    if (!$pwd) {
        $errors[] = "password is required";
    }

    if (!$repeatpwd) {
        $errors[] = "re-enter your password is required";
    }

    if (!$usertype) {
        $errors[] = "usertype is required";
    }

    if (!preg_match("/^[a-zA-Z0-9- ']*$/", $username)) {
        $errors[] = "invalid username";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "invalid email";
    }

    if ($pwd !== $repeatpwd) {
        $errors[] = "password not match";
    }

    if (exist($data, $username, $email) !== false) {
        $errors[] = "username or email already exist";
    }

    if(!is_dir("images"))
    {
        mkdir("images");
    }

    if (empty($errors)) {

        $image = $_FILES['image'] ?? null;
        //checking whether the image is uploaded or not

        $imagePath = '';
        if ($image && $image['tmp_name']) {

            $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
            

            mkdir(dirname($imagePath));
            //dirname function accept file path and return file path again
            move_uploaded_file($image['tmp_name'], $imagePath);
        }
    }

    if (empty($errors)) {

        create($data, $fullname, $username, $email, $pwd, $usertype, $imagePath);
    }
}

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


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/manageuser.css">
    <title>Product Crud</title>
</head>

<body>
    <h1>Add User</h1>

        <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error) { ?>
                    <div><?php echo $error ?></div>
                <?php } ?>
            </div>
        <?php } ?>


        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>image</label>
                <br>
                <input type="file" name="image">
            </div>
            <div class="form-group">
                <label>fullname</label>
                <input type="text" class="form-control" name="fullname">
            </div>
            <div class="form-group">
                <label>username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label>password</label>
                <input type="password" class="form-control" name="pwd">
            </div>
            <div class="form-group">
                <label>Re-enter password</label>
                <input type="password" class="form-control" name="repeatpwd">
            </div>
            <div class="form-group">
                <label>usertype</label>
                <select type="text" class="form-control" name="usertype">
                    <option value="employee1">Air-Conditioning and Electrical & Electronic</option>
                    <option value="employee2">Pest Control and Cleaning & Sanitary</option>
                    <option value="employee3">Fire Fighting & Alarm System and Pump</option>
                    <option value="employee4">Sewage and Civil</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </body>

</html>