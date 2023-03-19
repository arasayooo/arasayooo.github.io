<?php

session_start();

if (($_SESSION["usertype"] !== 'user')) {
   header('Location: ../html/login.php');
}

include 'db.php';
$id = $_SESSION['id'];
$sid = $_GET["id"];

// echo '<pre>';
// var_dump($sid);
// echo '</pre>';
// exit();

$sql2 = "SELECT * FROM review_table LEFT JOIN user ON review_table.id = user.id WHERE review_table.serviceid='$sid';";
$sql3 = "SELECT * FROM serviceemp LEFT JOIN servicetype ON serviceemp.serviceType=servicetype.id WHERE serviceemp.serviceid=$sid;";
$query = mysqli_query($data, $sql2);
$query2 = mysqli_query($data, $sql3);
$row = mysqli_fetch_array($query);
$row2 = mysqli_fetch_array($query2);
$user_rating = $row['user_rating'];
$user_review = $row['user_review'];
$servicetype = $row2['category'];
$serviceid = $row['serviceid'];
$fullname = $row['Fullname'];

$connect = new PDO("mysql:host=localhost:3308;dbname=powerec", "root", "");

if (isset($_POST["rating_data"])) {

   $data = array(
      ':serviceid'        =>   $_POST["serviceid"],
      ':user_rating'      =>   $_POST["rating_data"],
      ':user_review'      =>   $_POST["user_review"],
      ':datetime'         =>   time()
   );

   $query = "
	UPDATE review_table SET user_rating=:user_rating, user_review=:user_review, datetime=:datetime WHERE serviceid=:serviceid
	";

   $statement = $connect->prepare($query);

   $statement->execute($data);

   echo "Your Review & Rating Successfully Updated";
}

if (isset($_POST["action"])) {
   $average_rating = 0;
   $total_review = 0;
   $five_star_review = 0;
   $four_star_review = 0;
   $three_star_review = 0;
   $two_star_review = 0;
   $one_star_review = 0;
   $total_user_rating = 0;
   $review_content = array();

   $query = "
	SELECT * FROM review_table LEFT JOIN user ON review_table.id=user.id
	ORDER BY review_id DESC
	";

   $result = $connect->query($query, PDO::FETCH_ASSOC);

   foreach ($result as $row) {
      $review_content[] = array(
         'fullname'      =>   $row["Fullname"],
         'user_review'   =>   $row["user_review"],
         'rating'      =>   $row["user_rating"],
         'datetime'      =>   date('l jS, F Y h:i:s A', $row["datetime"])
      );

      if ($row["user_rating"] == '5') {
         $five_star_review++;
      }

      if ($row["user_rating"] == '4') {
         $four_star_review++;
      }

      if ($row["user_rating"] == '3') {
         $three_star_review++;
      }

      if ($row["user_rating"] == '2') {
         $two_star_review++;
      }

      if ($row["user_rating"] == '1') {
         $one_star_review++;
      }

      $total_review++;

      $total_user_rating = $total_user_rating + $row["user_rating"];
   }

   $average_rating = $total_user_rating / $total_review;

   $output = array(
      'average_rating'   =>   number_format($average_rating, 1),
      'total_review'      =>   $total_review,
      'five_star_review'   =>   $five_star_review,
      'four_star_review'   =>   $four_star_review,
      'three_star_review'   =>   $three_star_review,
      'two_star_review'   =>   $two_star_review,
      'one_star_review'   =>   $one_star_review,
      'review_data'      =>   $review_content
   );

   echo json_encode($output);
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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
   <div class="modal-body">
      <h4 class="text-center mt-2 mb-4">
         <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
         <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
         <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
         <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
         <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
      </h4>
      <?php include 'db.php';
      $id = $_SESSION["id"];
      $sql1 = "SELECT * FROM user WHERE id='$id';";
      $statement = mysqli_stmt_init($data);
      $prepare = mysqli_stmt_prepare($statement, $sql1);
      mysqli_stmt_execute($statement);
      $getresult2 = mysqli_stmt_get_result($statement);
      $fetch1 = mysqli_fetch_assoc($getresult2);
      mysqli_stmt_close($statement);

      $sql = "SELECT * FROM serviceemp LEFT JOIN servicetype ON serviceemp.serviceType=servicetype.id WHERE serviceid='$serviceid';";
      $statement = mysqli_stmt_init($data);
      $prepare = mysqli_stmt_prepare($statement, $sql);
      mysqli_stmt_execute($statement);
      $getresult = mysqli_stmt_get_result($statement);
      $fetchs = mysqli_fetch_assoc($getresult);
      mysqli_stmt_close($statement);
      ?>
      <div class="form-group">
         <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo $fetch1['Fullname']; ?>" placeholder="<?php echo $fetch1['Fullname']; ?>" readonly />
      </div>
      <div class="form-group">
         <input type="text" name="serviceid" id="serviceid" class="form-control" value="<?php echo $serviceid; ?>" placeholder="<?php echo $serviceid; ?>" readonly />
      </div>
      <div class="form-group">
         <input type="text" name="servicetype" id="servicetype" class="form-control" value="<?php echo $servicetype; ?>" placeholder="<?php echo $servicetype; ?>" readonly />
      </div>
      <div class="form-group">
         <textarea name="user_review" id="user_review" class="form-control"><?php echo $user_review; ?></textarea>
      </div>
      <div class="form-group text-center mt-4">
         <button type="button" class="btn btn-primary" id="save_review">Submit</button>
      </div>
   </div>
   </div>
   </div>
   </div>
</body>
<style>
   .progress-label-left {
      float: left;
      margin-right: 0.5em;
      line-height: 1em;
   }

   .progress-label-right {
      float: right;
      margin-left: 0.3em;
      line-height: 1em;
   }

   .star-light {
      color: #e9ecef;
   }
</style>

<script>
   $(document).ready(function() {

      var rating_data = 0;

      $('#add_review').click(function() {

         $('#review_modal').modal('show');

      });

      $(document).on('mouseenter', '.submit_star', function() {

         var rating = $(this).data('rating');

         reset_background();

         for (var count = 1; count <= rating; count++) {

            $('#submit_star_' + count).addClass('text-warning');

         }

      });

      function reset_background() {
         for (var count = 1; count <= 5; count++) {

            $('#submit_star_' + count).addClass('star-light');

            $('#submit_star_' + count).removeClass('text-warning');

         }
      }

      $(document).on('mouseleave', '.submit_star', function() {

         reset_background();

         for (var count = 1; count <= rating_data; count++) {

            $('#submit_star_' + count).removeClass('star-light');

            $('#submit_star_' + count).addClass('text-warning');
         }

      });

      $(document).on('click', '.submit_star', function() {

         rating_data = $(this).data('rating');

      });


      $('#save_review').click(function() {
         var fullname = $('#fullname').val();
         var serviceid = $('#serviceid').val();
         var servicetype = $('#servicetype').val();
         var user_review = $('#user_review').val();

         if (user_review == '') {
            alert("Please Fill Both Field");
            return false;
         } else {
            $.ajax({
               url: "editfeedback.php?id=<?php echo $_GET['id']?>",
               method: "POST",
               data: {
                  rating_data: rating_data,
                  fullname: fullname,
                  serviceid: serviceid,
                  servicetype: servicetype,
                  user_review: user_review
               },
               success: function(data) {
                  $('#review_modal').modal('hide');

                  load_rating_data();

                  alert(data);
               }
            })
         }

      });

      load_rating_data();

      function load_rating_data() {
         $.ajax({
            url: "editfeedback.php?id=<?php echo $_GET['id'] ?>",
            method: "POST",
            data: {
               action: 'load_data'
            },
            dataType: "JSON",
            success: function(data) {
               $('#average_rating').text(data.average_rating);
               $('#total_review').text(data.total_review);

               var count_star = 0;

               $('.main_star').each(function() {
                  count_star++;
                  if (Math.ceil(data.average_rating) >= count_star) {
                     $(this).addClass('text-warning');
                     $(this).addClass('star-light');
                  }
               });

               $('#total_five_star_review').text(data.five_star_review);

               $('#total_four_star_review').text(data.four_star_review);

               $('#total_three_star_review').text(data.three_star_review);

               $('#total_two_star_review').text(data.two_star_review);

               $('#total_one_star_review').text(data.one_star_review);

               $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

               $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

               $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

               $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

               $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

               if (data.review_data.length > 0) {
                  var html = '';

                  for (var count = 0; count < data.review_data.length; count++) {
                     html += '<div class="row mb-3">';
                     html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' + data.review_data[count].fullname.charAt(0) + '</h3></div></div>';

                     html += '<div class="col-sm-11">';

                     html += '<div class="card">';

                     html += '<div class="card-header"><b>' + data.review_data[count].fullname + '</b></div>';
                     html += '<div class="card-body">';
                     for (var star = 1; star <= 5; star++) {
                        var class_name = '';

                        if (data.review_data[count].rating >= star) {
                           class_name = 'text-warning';
                        } else {
                           class_name = 'star-light';
                        }

                        html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                     }
                     var output = '<?php echo $fetch1['Fullname']; ?>';

                     // document.write(output);
                     // console.log(output);
                     if (data.review_data[count].fullname == output) {
                        html += '<a class="far fa-edit" href="editfeedback.php?id=<?php echo $serviceid; ?>" style="font-size: 100%; color: blue; margin-left:810px; margin-top:-50px; margin-right:7px;"></a>';
                        html += '<a href="deletefeedback.php?id=<?php echo $serviceid; ?>" class="fas fa-trash-alt" style="color:red;"></a>';
                     }
                     html += '<br />';
                     html += '<br />';
                     html += data.review_data[count].user_review;

                     html += '</div>';

                     html += '<div class="card-footer text-right">On ' + data.review_data[count].datetime + '</div>';

                     html += '</div>';

                     html += '</div>';

                     html += '</div>';
                  }

                  $('#review_content').html(html);
               }
            }
         })
      }

   });
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>