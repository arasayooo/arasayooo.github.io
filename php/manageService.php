<?php

include 'db.php';

$type = $_GET['type'];

$sql2 = "SELECT * FROM serviceemp WHERE serviceType=$type;";
$statement = mysqli_stmt_init($data);
$prepare2 = mysqli_stmt_prepare($statement, $sql2);
mysqli_stmt_execute($statement);
$getresult2 = mysqli_stmt_get_result($statement);
$fetchs2 = mysqli_fetch_assoc($getresult2);
mysqli_stmt_close($statement);

$u = 1;

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
   <table class="table table-striped">
      <thead>
         <tr>
            <th scope="col">#</th>
            <th scope="col">Service ID</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Operation</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($getresult2 as $i => $fetch2) { ?>
            <tr>
               <th scope="row"><?php echo $u++ ?></th>
               <td><?php echo $fetch2['serviceid'] ?></td>
               <td><?php echo $fetch2['date'] ?></td>
               <td><?php echo $fetch2['time'] ?></td>
               <td>
                  <a type="button" class="btn btn-primary" href="editService.php?type=<?php echo $type ?>&id=<?php echo $fetch2['serviceid'] ?>">Edit</a>
                  <a type="button" class="btn btn-danger" href="deleteServiceEmp.php?id=<?php echo $fetch2['serviceid'] ?>">Delete</a>
               </td>
            </tr>
         <?php } ?>
      </tbody>
   </table>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>