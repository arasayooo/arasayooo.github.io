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

$sql = "SELECT * FROM user WHERE usertype != 'user'";
$statement = mysqli_stmt_init($data);
$prepare = mysqli_stmt_prepare($statement, $sql);
mysqli_stmt_execute($statement);
$getresult = mysqli_stmt_get_result($statement);
$fetchs = mysqli_fetch_assoc($getresult);
mysqli_stmt_close($statement);

// $result = mysqli_query($data, $sql);
// $fetchs = mysqli_fetch_array($result);
// mysqli_stmt_close($data);

?>





<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../css/bootstrap2.css">
    <link rel="stylesheet" href="../css/bootstrap2.min.css"> -->
    <link rel="stylesheet" href="../css/manageuser.css">
    <title>Manage User</title>
</head>

<body>
    <h1>Manage User</h1>
    <p>
        <a href=createUser.php class="btn btn-success">Add User</a>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col" width="20">Username</th>
                <th scope="col">Fullname</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Usertype</th>
                <th scope="col">Action</th>
                <!-- <th scope="col">Password</th> decode password-->

            </tr>
        </thead>
        <tbody>
            <?php foreach ($getresult as $i => $fetch) { ?>

                <tr>
                    <th scope="row"> <?php echo $i + 1 ?></th>
                    <td>
                        <img src="<?php echo $fetch['image'] ?>" class="thumb-image" alt="">
                    </td>
                    <td> <?php echo $fetch['username'] ?> </td>
                    <td> <?php echo $fetch['Fullname'] ?> </td>
                    <td> <?php echo $fetch['email'] ?> </td>
                    <td> <?php echo $fetch['phone'] ?> </td>
                    <td> <?php echo $fetch['usertype'] ?> </td>
                    <td>
                        <form class="lol" method="post" action="editUser.php?id=<?php echo $fetch['id'] ?>">
                            <input type="hidden" name="id" value="<?php echo $fetch['id'] ?>">
                            <button type="submit" class="btn-sm btn btn-outline-primary">Edit</button>
                        </form>
                        <form class="lol" method="post" action="deleteUser.php">
                            <input type="hidden" name="id" value="<?php echo $fetch['id'] ?>">
                            <button type="submit" class="btn-sm btn btn-outline-danger">Delete</button>
                        </form>
                    </td>

                </tr>


            <?php } ?>

        </tbody>
    </table>
</body>

</html>