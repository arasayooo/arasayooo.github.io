<?php

include 'db.php';

$id = $_GET['id'];
$type = $_GET['type'];
// echo '<pre>';
// var_dump($type);
// echo '</pre>';
// exit();

$sql2 = "SELECT * FROM serviceemp WHERE serviceid=$id;";
$query = mysqli_query($data, $sql2);
$row = mysqli_fetch_array($query);
$date = $row['date'];
$time = $row['time'];

if (isset($_POST['submit'])) {
   $date = $_POST['date'];
   $time = $_POST['time'];
   $type2 = $_POST['servicetype'];

   if (!$id) {
      header("Location: manageService.php?type=$type2");
      exit();
   }

   $sql = "UPDATE serviceemp SET date='$date', time='$time' WHERE serviceid='$id';";
   $query = mysqli_query($data, $sql);
   if ($query) {
      echo "Data is updated";
   } else {
      echo "Data is not updated";
   }

   mysqli_close($data);
   header("Location:manageService.php?type=$type2");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
   <form action="editService.php?id=<?php echo $id; ?>" method="post">
      <div class="main-form mt-3 border-bottom">
         <div class="row">
            <div class="col-md-3">
               <div class="form-group mb-2">
                  <div class="form-group">
                     <label>Date</label>
                     <input type="date" class="form-control" name="date" value="<?php echo $date; ?>">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group mb-2">
                  <div class="form-group">
                     <label>Time</label>
                     <input type="time" class="form-control" name="time" value="<?php echo $time; ?>">
                     <input type="hidden" class="form-control" name="servicetype" value="<?php echo $type; ?>">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <br>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
   </form>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>