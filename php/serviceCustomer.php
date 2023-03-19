<?php

include "db.php";
$serviceType = $_GET['type'];

session_start();

if (($_SESSION["usertype"] !== 'user')) {
    header('Location: ../html/login.php');
}

// echo '<pre>';
// var_dump($dataa);
// echo '</pre>';
// exit();



$errors = [];
$fullname = '';
$email = '';
$phone = '';
$address = '';
$description = '';
$datetime = '';
$id = '';
$date = '';
$time = '';
date_default_timezone_set("Asia/Kuala_Lumpur");



function create($data, $serviceid, $phone, $address, $description, $datetime, $id)
{
    $sql = "INSERT INTO serviceCus (serviceid, phone, address, description, datetime, id) VALUES (?,?,?,?,?,?);";
    $statement = mysqli_stmt_init($data);
    if (!mysqli_stmt_prepare($statement, $sql)) {
        // echo '<pre>';
        // var_dump($time);
        // echo '</pre>';
        echo "error betul";
        exit();
    }

    mysqli_stmt_bind_param($statement, "ssssss", $serviceid, $phone, $address, $description, $datetime, $id);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("Location:../html/service.html");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = date('Y-m-d', strtotime($_POST['date']));
    $time = date('H:i:s a', strtotime($_POST['time']));
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $datetime = date('Y-m-d H:i:s');
    $id = $_SESSION['id'];
    $serviceType = $_POST['serviceType'];

    $sql3 = "SELECT * FROM serviceemp WHERE date = '$date' AND time = '$time';";
    $query = mysqli_query($data, $sql3);
    $fetchhh = mysqli_fetch_array($query);
    $serviceid = $fetchhh["serviceid"];

    if (!$date) {
        $errors[] = "There is no available date";
    }

    if (!$time) {
        $errors[] = "There is no available time";
    }

    if (!$phone) {
        $errors[] = "Phone is required";
    }

    if (!$address) {
        $errors[] = "Address is required";
    }

    if (!$description) {
        $errors[] = "Description is required";
    }

    if (empty($errors)) {
        create($data, $serviceid, $phone, $address, $description, $datetime, $id);
    }
}

if (isset($_POST['submit'])) {
    $sql = "UPDATE serviceemp SET status='8' WHERE serviceid = '$serviceid';";
    $query = mysqli_query($data, $sql);
    if ($query) {
        echo "Data is updated";
    } else {
        echo "Data is not updated";
    }
    mysqli_close($data);
    header("Location:../html/service.php");
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
    <link rel="stylesheet" href="../css/serviceCustomer.css">
    <title>Services</title>
</head>

<script>
    function my_fun(str) {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('poll').innerHTML = this.responseText;
            }
        }

        xmlhttp.open("GET", "helper.php?type=<?php echo $serviceType; ?>&value=" + str, true);
        xmlhttp.send();
    }
</script>

<body>
    <h1>Book Services</h1>
    <?php if (!empty($errors)) { ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error) { ?>
                <div><?php echo $error ?></div>
            <?php } ?>
        </div>
    <?php } ?>
    <?php
    include '../php/db.php';



    $sql = "SELECT DISTINCT date FROM serviceemp WHERE serviceType = '$serviceType' AND status = '7';";
    $statement = mysqli_stmt_init($data);
    $prepare = mysqli_stmt_prepare($statement, $sql);
    mysqli_stmt_execute($statement);
    $getresult = mysqli_stmt_get_result($statement);
    $fetchs = mysqli_fetch_assoc($getresult);
    mysqli_stmt_close($statement);
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Available Date</label>
            <select type="text" class="form-control" id="SelectA" name="date" onchange="my_fun(this.value);">
                <option disabled hidden selected>Choose a date</option>
                <?php foreach ($getresult as $i => $fetch) { ?>
                    <option value="<?php echo $fetch["date"] ?>"><?php echo $fetch["date"] ?></option>
                <?php } ?>
            </select>
        </div>
        <div id="poll" class="form-group">
            <label>Available Time</label>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" class="form-control" name="phone">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="description">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>