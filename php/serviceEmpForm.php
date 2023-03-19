<?php

include "db.php";

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

//  echo '<pre>';
//  var_dump($_FILES);
//  echo '</pre>';



$errors = [];
$servicetypes = '';
$date = '';
$time = '';
$status = '';
date_default_timezone_set("Asia/Kuala_Lumpur");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $type = $_GET['type'];
    $day = date("Y-m-d");
    $string = implode(" ", $date);
    $string2 = implode(" ", $time);
    $string3 = ':00';
    $string4 = $string2 . $string3;

    $sql6 = "SELECT * FROM serviceemp WHERE serviceType = '$type' AND status = '7';";
    $statement = mysqli_stmt_init($data);
    $prepare6 = mysqli_stmt_prepare($statement, $sql6);
    mysqli_stmt_execute($statement);
    $getresult6 = mysqli_stmt_get_result($statement);
    $fetchs6 = mysqli_fetch_assoc($getresult6);
    mysqli_stmt_close($statement);


    if (!$date) {
        $errors[] = "Date is required";
    }

    if (!$time) {
        $errors[] = "Time is required";
    }

    if ($string < $day) {
        $errors[] = "Date entered already past";
    }

    $exist = 0;
    foreach ($getresult6 as $i => $T) {
        if ($string === $T['date']) {
            if ($string4 === $T['time']) {
                $exist++;
            }
        }
    }

    if ($exist > 0) {
        $errors[] = "Date and time already exist";
    }

    $duplicate = 0;
    for ($i = 0; $i < count($date); $i++) {
        for ($j = 0; $j < count($date); $j++) {
            if ($date[$i] == $date[$j]) {
                if ($time[$i] == $time[$j]) {
                    $duplicate++;
                }
            }
        }
    }

    if ($duplicate > count($date)) {
        $errors[] = "Duplication data entered";
    }

    foreach ($date as $i => $date) {
        if (empty($errors)) {
            $sql = "INSERT INTO serviceemp (date, time, status,serviceType) VALUES ('{$date}', '{$time[$i]}','7','{$type}');";
            $query_run = mysqli_query($data, $sql);
            header("Location:../html/serviceEmp.php");
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/serviceEmployee.css">
    <title>Services</title>
</head>

<body>
    <div class="row">
        <div class="col-md-12">
            <div class="card-mt-4">
                <br>
                <h1>Add Services
                    <a href="javascript:void(0)" class="add-item float-end btn btn-primary">Add Date</a>
                </h1>

                <?php if (!empty($errors)) { ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error) { ?>
                            <div><?php echo $error ?></div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="main-form mt-3 border-bottom">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" class="form-control" name="date[]">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <div class="form-group">
                                        <label>Time</label>
                                        <input type="time" class="form-control" name="time[]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="paste-new-forms"></div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {

        var maxField = 7;
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="main-form mt-3 border-bottom">\
                            <div class = "row">\
                                <div class = "col-md-3">\
                                    <div class = "form-group mb-2">\
                                        <div class = "form-group">\
                                            <label> Date </label>\
                                            <input type = "date"  class = "form-control" name = "date[]">\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class = "col-md-3">\
                                    <div class = "form-group mb-2">\
                                        <div class = "form-group">\
                                            <label> Time </label>\
                                            <input type = "time" class = "form-control" name = "time[]">\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="col-md-3">\
                                    <div class="form-group mb-2">\
                                        <br>\
                                        <button type="button" class="remove-btn btn btn-danger">Remove</button>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>'; //New input field html 
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(document).on('click', '.add-item', function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $('.paste-new-forms').append(fieldHTML); //Add field html
            }
        });

        $(document).on('click', '.remove-btn', function() {
            $(this).closest('.main-form').remove();
            x--;
        });

        // $(document).on('click', '.add-item', function() {
        //     $('.paste-new-forms').append('<div class="main-form mt-3 border-bottom">\
        //         <div class = "row">\
        //             <div class = "col-md-3">\
        //                 <div class = "form-group mb-2">\
        //                     <div class = "form-group">\
        //                         <label> Date </label>\
        //                         <input type = "date"  class = "form-control" name = "date">\
        //                     </div>\
        //                 </div>\
        //             </div>\
        //             <div class = "col-md-3">\
        //                 <div class = "form-group mb-2">\
        //                     <div class = "form-group">\
        //                         <label> Time </label>\
        //                         <input type = "time" class = "form-control" name = "time">\
        //                     </div>\
        //                 </div>\
        //             </div>\
        //             <div class = "col-md-3">\
        //                 <div class = "form-group mb-2">\
        //                     <div class = "form-group">\
        //                         <label> Status </label>\
        //                         <select type = "text" class = "form-control" name = "status">\
        //                             <option value = "available"> Available </option>\
        //                             <option value = "notavailable"> Not Available </option>\
        //                         </select>\
        //                     </div>\
        //                 </div>\
        //             </div>\
        //             <div class="col-md-3">\
        //                 <div class="form-group mb-2">\
        //                     <br>\
        //                     <button type="button" class="remove-btn btn btn-danger">Remove</button>\
        //                 </div>\
        //             </div>\
        //         </div>\
        //     </div>');
        // });
    });
</script>