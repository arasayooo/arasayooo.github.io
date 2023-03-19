<?php

$host = "127.0.0.1:3308";
$user = "root";
$password = "";
$db = "powerec";

$data = mysqli_connect($host, $user, $password, $db);
$statement = mysqli_stmt_init($data);
// $stmt = "SELECT * FROM login;";
// $aaa = mysqli_query($data, $stmt);
// mysqli_stmt_execute($statement);
// $result = mysqli_stmt_get_result($statement);
// $return = mysqli_fetch_assoc($aaa);



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
$usertype = '';
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

$sql2 = "SELECT * FROM user WHERE id=$id;";
$result = mysqli_query($data, $sql2);
$row = mysqli_fetch_assoc($result);
$fullname = $row['Fullname'];
$username = $row['username'];
$email = $row['email'];
$usertype = $row['usertype'];
$image = $row['image'];

if(isset($_POST['update']))
{
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $usertype = $_POST['usertype'];
    $image = $_FILES['image'] ?? null;
    $imagePath = '';
    if ($image && $image['tmp_name']) 
    {
        $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
        mkdir(dirname($imagePath));
        //dirname function accept file path and return file path again
        move_uploaded_file($image['tmp_name'], $imagePath);
    }
    if(!$id)
    {
        header("Location: manageUser.php");
        exit();
    }
    
    $sql = "UPDATE user SET username='$username', Fullname='$fullname', email='$email', phone='$phone', usertype='$usertype', image='$imagePath' WHERE id='$id';";
    $query = mysqli_query($data, $sql);
    if($query)
    {
        echo "Data is updated";
    }
    else
    {
        echo "Data is not updated";
    }
    mysqli_close($data);
    header("Location:manageUser.php");
}

?>

<!-- <!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/edituser.css">
        <title>Product Crud</title>
    </head>

    <body>
        <h1>Edit User</h1>

        <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error) { ?>
                    <div><?php echo $error ?></div>
                <?php } ?>
            </div>
        <?php } ?>
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>fullname</label>
                <input type="text" class="form-control" name="fullname" value="<?php echo $fullname ?>">
            </div>
            <div class="form-group">
                <label>username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $email ?>">
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
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </body>
</html> -->