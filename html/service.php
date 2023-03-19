<?php include '../php/db.php';

session_start();

if (($_SESSION["usertype"] !== 'user')) {
  header('Location: login.php');
}

$id = $_SESSION["id"];

$sql1 = "SELECT * FROM serviceemp WHERE status = '7' AND serviceType = '1';";
$statement = mysqli_stmt_init($data);
$prepare1 = mysqli_stmt_prepare($statement, $sql1);
mysqli_stmt_execute($statement);
$getresult1 = mysqli_stmt_get_result($statement);
$fetchs1 = mysqli_fetch_assoc($getresult1);
mysqli_stmt_close($statement);
$query1 = mysqli_query($data, $sql1);
$fetchh1 = mysqli_fetch_array($query1);

$sql2 = "SELECT * FROM serviceemp WHERE status = '7' AND serviceType = '2';";
$statement = mysqli_stmt_init($data);
$prepare2 = mysqli_stmt_prepare($statement, $sql2);
mysqli_stmt_execute($statement);
$getresult2 = mysqli_stmt_get_result($statement);
$fetchs2 = mysqli_fetch_assoc($getresult2);
mysqli_stmt_close($statement);
$query2 = mysqli_query($data, $sql2);
$fetchh2 = mysqli_fetch_array($query2);

$sql3 = "SELECT * FROM serviceemp WHERE status = '7' AND serviceType = '3';";
$statement = mysqli_stmt_init($data);
$prepare3 = mysqli_stmt_prepare($statement, $sql3);
mysqli_stmt_execute($statement);
$getresult3 = mysqli_stmt_get_result($statement);
$fetchs3 = mysqli_fetch_assoc($getresult3);
mysqli_stmt_close($statement);
$query3 = mysqli_query($data, $sql3);
$fetchh3 = mysqli_fetch_array($query3);

$sql4 = "SELECT * FROM serviceemp WHERE status = '7' AND serviceType = '4';";
$statement = mysqli_stmt_init($data);
$prepare4 = mysqli_stmt_prepare($statement, $sql4);
mysqli_stmt_execute($statement);
$getresult4 = mysqli_stmt_get_result($statement);
$fetchs4 = mysqli_fetch_assoc($getresult4);
mysqli_stmt_close($statement);
$query4 = mysqli_query($data, $sql4);
$fetchh4 = mysqli_fetch_array($query4);

$sql5 = "SELECT * FROM serviceemp WHERE status = '7' AND serviceType = '5';";
$statement = mysqli_stmt_init($data);
$prepare5 = mysqli_stmt_prepare($statement, $sql5);
mysqli_stmt_execute($statement);
$getresult5 = mysqli_stmt_get_result($statement);
$fetchs5 = mysqli_fetch_assoc($getresult5);
mysqli_stmt_close($statement);
$query5 = mysqli_query($data, $sql5);
$fetchh5 = mysqli_fetch_array($query5);

$sql6 = "SELECT * FROM serviceemp WHERE status = '7' AND serviceType = '6';";
$statement = mysqli_stmt_init($data);
$prepare6 = mysqli_stmt_prepare($statement, $sql6);
mysqli_stmt_execute($statement);
$getresult6 = mysqli_stmt_get_result($statement);
$fetchs6 = mysqli_fetch_assoc($getresult6);
mysqli_stmt_close($statement);
$query6 = mysqli_query($data, $sql6);
$fetchh6 = mysqli_fetch_array($query6);

$sql7 = "SELECT * FROM serviceemp WHERE status = '7' AND serviceType = '7';";
$statement = mysqli_stmt_init($data);
$prepare7 = mysqli_stmt_prepare($statement, $sql7);
mysqli_stmt_execute($statement);
$getresult7 = mysqli_stmt_get_result($statement);
$fetchs7 = mysqli_fetch_assoc($getresult7);
mysqli_stmt_close($statement);
$query7 = mysqli_query($data, $sql7);
$fetchh7 = mysqli_fetch_array($query7);

$sql8 = "SELECT * FROM serviceemp WHERE status = '7' AND serviceType = '8';";
$statement = mysqli_stmt_init($data);
$prepare8 = mysqli_stmt_prepare($statement, $sql8);
mysqli_stmt_execute($statement);
$getresult8 = mysqli_stmt_get_result($statement);
$fetchs8 = mysqli_fetch_assoc($getresult8);
mysqli_stmt_close($statement);
$query8 = mysqli_query($data, $sql8);
$fetchh8 = mysqli_fetch_array($query8);

$sql9 = "SELECT * FROM serviceemp WHERE status = '7' AND serviceType = '9';";
$statement = mysqli_stmt_init($data);
$prepare9 = mysqli_stmt_prepare($statement, $sql9);
mysqli_stmt_execute($statement);
$getresult9 = mysqli_stmt_get_result($statement);
$fetchs9 = mysqli_fetch_assoc($getresult9);
mysqli_stmt_close($statement);
$query9 = mysqli_query($data, $sql9);
$fetchh9 = mysqli_fetch_array($query9);

$sql11 = "SELECT * FROM servicecus LEFT JOIN serviceemp ON servicecus.serviceid = serviceemp.serviceid WHERE serviceemp.serviceType = '1';";
$statement = mysqli_stmt_init($data);
$prepare11 = mysqli_stmt_prepare($statement, $sql11);
mysqli_stmt_execute($statement);
$getresult11 = mysqli_stmt_get_result($statement);
$fetchs11 = mysqli_fetch_assoc($getresult11);
mysqli_stmt_close($statement);

$sql21 = "SELECT * FROM servicecus LEFT JOIN serviceemp ON servicecus.serviceid = serviceemp.serviceid WHERE serviceemp.serviceType = '2';";
$statement = mysqli_stmt_init($data);
$prepare21 = mysqli_stmt_prepare($statement, $sql21);
mysqli_stmt_execute($statement);
$getresult21 = mysqli_stmt_get_result($statement);
$fetchs21 = mysqli_fetch_assoc($getresult21);
mysqli_stmt_close($statement);

$sql31 = "SELECT * FROM servicecus LEFT JOIN serviceemp ON servicecus.serviceid = serviceemp.serviceid WHERE serviceemp.serviceType = '3';";
$statement = mysqli_stmt_init($data);
$prepare31 = mysqli_stmt_prepare($statement, $sql31);
mysqli_stmt_execute($statement);
$getresult31 = mysqli_stmt_get_result($statement);
$fetchs31 = mysqli_fetch_assoc($getresult31);
mysqli_stmt_close($statement);

$sql41 = "SELECT * FROM servicecus LEFT JOIN serviceemp ON servicecus.serviceid = serviceemp.serviceid WHERE serviceemp.serviceType = '4';";
$statement = mysqli_stmt_init($data);
$prepare41 = mysqli_stmt_prepare($statement, $sql41);
mysqli_stmt_execute($statement);
$getresult41 = mysqli_stmt_get_result($statement);
$fetchs41 = mysqli_fetch_assoc($getresult41);
mysqli_stmt_close($statement);

$sql51 = "SELECT * FROM servicecus LEFT JOIN serviceemp ON servicecus.serviceid = serviceemp.serviceid WHERE serviceemp.serviceType = '5';";
$statement = mysqli_stmt_init($data);
$prepare51 = mysqli_stmt_prepare($statement, $sql51);
mysqli_stmt_execute($statement);
$getresult51 = mysqli_stmt_get_result($statement);
$fetchs51 = mysqli_fetch_assoc($getresult51);
mysqli_stmt_close($statement);

$sql61 = "SELECT * FROM servicecus LEFT JOIN serviceemp ON servicecus.serviceid = serviceemp.serviceid WHERE serviceemp.serviceType = '6';";
$statement = mysqli_stmt_init($data);
$prepare61 = mysqli_stmt_prepare($statement, $sql61);
mysqli_stmt_execute($statement);
$getresult61 = mysqli_stmt_get_result($statement);
$fetchs61 = mysqli_fetch_assoc($getresult61);
mysqli_stmt_close($statement);

$sql71 = "SELECT * FROM servicecus LEFT JOIN serviceemp ON servicecus.serviceid = serviceemp.serviceid WHERE serviceemp.serviceType = '7';";
$statement = mysqli_stmt_init($data);
$prepare71 = mysqli_stmt_prepare($statement, $sql71);
mysqli_stmt_execute($statement);
$getresult71 = mysqli_stmt_get_result($statement);
$fetchs71 = mysqli_fetch_assoc($getresult71);
mysqli_stmt_close($statement);

$sql81 = "SELECT * FROM servicecus LEFT JOIN serviceemp ON servicecus.serviceid = serviceemp.serviceid WHERE serviceemp.serviceType = '8';";
$statement = mysqli_stmt_init($data);
$prepare81 = mysqli_stmt_prepare($statement, $sql81);
mysqli_stmt_execute($statement);
$getresult81 = mysqli_stmt_get_result($statement);
$fetchs81 = mysqli_fetch_assoc($getresult81);
mysqli_stmt_close($statement);

$sql91 = "SELECT * FROM servicecus LEFT JOIN serviceemp ON servicecus.serviceid = serviceemp.serviceid WHERE serviceemp.serviceType = '9';";
$statement = mysqli_stmt_init($data);
$prepare91 = mysqli_stmt_prepare($statement, $sql91);
mysqli_stmt_execute($statement);
$getresult91 = mysqli_stmt_get_result($statement);
$fetchs91 = mysqli_fetch_assoc($getresult91);
mysqli_stmt_close($statement);

// $sql100 = "SELECT * FROM servicecus LEFT JOIN user ON servicecus.id = user.id LEFT JOIN serviceemp ON servicecus.serviceid = serviceemp.serviceid WHERE servicecus.id = $id;";
$sql100 = "SELECT * FROM servicecus a, serviceemp b, servicetype c, user d WHERE a.id = d.id AND a.serviceid = b.serviceid AND b.serviceType = c.id;";
$result100 = mysqli_query($data, $sql100);
$statement = mysqli_stmt_init($data);
$prepare100 = mysqli_stmt_prepare($statement, $sql100);
mysqli_stmt_execute($statement);
$getresult100 = mysqli_stmt_get_result($statement);
$fetchs100 = mysqli_fetch_assoc($getresult100);
mysqli_stmt_close($statement);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Services</title>
  <!-- <link rel="stylesheet" href="../html/bootstrap-5.1.3-dist/css/bootstrap.css"> -->
  <header>
    <?php include 'headerafterlogincus.php'; ?>
  </header>
  <link rel="stylesheet" href="../css/service.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>



<body>

  <!--=======Light/Dark theme button=======-->
  <div class="theme-btn flex-center">
    <i class="fas fa-moon" style="margin-top: 15px;"></i>
    <i class="fas fa-sun" style="margin-top: 15px;"></i>
  </div>

  <div class=" container" id="blur" style="margin-top: 50px">
    <div class="title" style="
          font-size: 180%;
          text-align: center;
          padding-left: 10px;
        ">
      <h1>LIST OF <span><br>SERVICES</span></h1>
    </div>
    <div class="product">
      <div class="product-card">
        <h2 style="color: white; font-size: 150%; bottom: 20%;" class="name">
          Pest <br /><span>Control</span>
        </h2>
        <a class="popup-btn">book</a>
        <img style="left: 35%; width: 80%; top: 20%" src="6.png" class="product-img" alt="" />
      </div>
      <div class="popup-view">
        <div class="popup-card">
          <a><i class="fas fa-times close-btn"></i></a>
          <div class="product-img">
            <img style="width: 95%; left: -25%" src="6.png" alt="" />
          </div>
          <div class="info" id="pagination_data">
          </div>
        </div>
      </div>
    </div>
    <div class="product">
      <div class="product-card">
        <h2 style="color: white; font-size: 150%; bottom: 20%;" class="name">
          Cleaning and Sanitary
        </h2>
        <!-- <span style="color: orange; font-size: 140%;" class="price">Details</span> -->
        <a class="popup-btn">book</a>
        <img style="width: 200%; left: 60%; top: 20%" src="7.png" class="product-img" alt="" />
      </div>
      <div class="popup-view">
        <div class="popup-card">
          <a><i class="fas fa-times close-btn"></i></a>
          <div class="product-img">
            <img style="width: 135%; left: -15%" src="7.png" alt="" />
          </div>
          <div class="info" id="pagination_data2">
          </div>
        </div>
      </div>
    </div>
    <div class="product">
      <div class="product-card">
        <h2 style="color: white; font-size: 150%; bottom: 20%" class="name">
          Air <br /><span>Conditioning</span>
        </h2>
        <!-- <span style="color: orange; font-size: 140%;" class="price">Details</span> -->
        <a class="popup-btn">book</a>
        <img style="left: 50%; width: 70%; top: 20%" src="8.png" class="product-img" alt="" />
      </div>
      <div class="popup-view">
        <div class="popup-card">
          <a><i class="fas fa-times close-btn"></i></a>
          <div class="product-img">
            <img style="width: 95%; left: -25%" src="8.png" alt="" />
          </div>
          <div class="info" id="pagination_data3">
          </div>
        </div>
      </div>
    </div>
    <div class="product">
      <div class="product-card">
        <h2 style="color: white; font-size: 150%; bottom: 20%" class="name">
          Electrical <br /><span>and</span> Electronic
        </h2>
        <!-- <span style="color: orange; font-size: 140%;" class="price">Details</span> -->
        <a class="popup-btn">book</a>
        <img style="left: 47%; width: 65%; top: 20%" src="9.png" class="product-img" alt="" />
      </div>
      <div class="popup-view">
        <div class="popup-card">
          <a><i class="fas fa-times close-btn"></i></a>
          <div class="product-img">
            <img style="width: 95%; left: -25%" src="9.png" alt="" />
          </div>
          <div class="info" id="pagination_data4">
          </div>
        </div>
      </div>
    </div>
    <div class="product">
      <div class="product-card">
        <h2 style="color: white; font-size: 150%; bottom: 20%" class="name">
          Alarm <br /><span>System</span>
        </h2>
        <!-- <span style="color: orange; font-size: 140%;" class="price">Details</span> -->
        <a class="popup-btn">book</a>
        <img style="left: 57%; width: 70%; top: 20%" src="10.png" class="product-img" alt="" />
      </div>
      <div class="popup-view">
        <div class="popup-card">
          <a><i class="fas fa-times close-btn"></i></a>
          <div class="product-img">
            <img style="width: 95%; left: -25%" src="10.png" alt="" />
          </div>
          <div class="info" id="pagination_data5">
          </div>
        </div>
      </div>
    </div>
    <div class="product">
      <div class="product-card">
        <h2 style="color: white; font-size: 150%; bottom: 25%" class="name">
          Pump
        </h2>
        <!-- <span style="color: orange; font-size: 140%;" class="price">Details</span> -->
        <a class="popup-btn">book</a>
        <img style="left: 50%; width: 75%; top: 20%" src="11.png" class="product-img" alt="" />
      </div>
      <div class="popup-view">
        <div class="popup-card">
          <a><i class="fas fa-times close-btn"></i></a>
          <div class="product-img">
            <img style="width: 95%; left: -25%" src="11.png" alt="" />
          </div>
          <div class="info" id="pagination_data6">
          </div>
        </div>
      </div>
    </div>
    <div class="product">
      <div class="product-card">
        <h2 style="color: white; font-size: 150%; bottom: 25%" class="name">
          Sewage
        </h2>
        <!-- <span style="color: orange; font-size: 140%;" class="price">Details</span> -->
        <a class="popup-btn">book</a>
        <img style="left: 50%; width: 78%; top: 20%" src="12.png" class="product-img" alt="" />
      </div>
      <div class="popup-view">
        <div class="popup-card">
          <a><i class="fas fa-times close-btn"></i></a>
          <div class="product-img">
            <img style="width: 95%; left: -25%" src="12.png" alt="" />
          </div>
          <div class="info" id="pagination_data7">
          </div>
        </div>
      </div>
    </div>
    <div class="product">
      <div class="product-card">
        <h2 style="color: white; font-size: 150%; bottom: 25%" class="name">
          Civil
        </h2>
        <!-- <span style="color: orange; font-size: 140%;" class="price">Details</span> -->
        <a class="popup-btn">book</a>
        <img style="left: 50%; width: 80%; top: 15%" src="13.png" class="product-img" alt="" />
      </div>
      <div class="popup-view">
        <div class="popup-card">
          <a><i class="fas fa-times close-btn"></i></a>
          <div class="product-img">
            <img style="width: 95%; left: -25%" src="13.png" alt="" />
          </div>
          <div class="info" id="pagination_data8">
          </div>
        </div>
      </div>
    </div>
    <div class="product">
      <div class="product-card">
        <h2 style="color: white; font-size: 150%; bottom: 25%" class="name">
          Others
        </h2>
        <!-- <span style="color: orange; font-size: 140%;" class="price">Details</span> -->
        <a class="popup-btn">book</a>
        <img style="left: 50%; width: 80%; top: 20%" src="14.png" class="product-img" alt="" />
      </div>
      <div class="popup-view">
        <div class="popup-card">
          <a><i class="fas fa-times close-btn"></i></a>
          <div class="product-img">
            <img style="width: 95%; left: -25%" src="14.png" alt="" />
          </div>
          <div class="info" id="pagination_data9">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="popup">
    <div class="container123">
      <h1>Booking Details</h1>
      <div class="table">
        <table class>
          <!-- <h2>Pest Control</h2> -->
          <thead>
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
              <th scope="col">Service Types</th>
              <!-- <th scope="col">Password</th> decode password-->
            </tr>
          </thead>
          <tbody>
            <?php foreach ($getresult100 as $i =>
              $fetch1) { ?>
              <tr>
                <td>
                  <?php echo $fetch1['date'] ?>
                </td>
                <td>
                  <?php echo $fetch1['phone'] ?>
                </td>
                <td>
                  <?php echo $fetch1['address'] ?>
                </td>
                <td>
                  <?php echo $fetch1['category'] ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <a href="#" onclick="toggle()" class="add-cart-btn">close</a>
  </div>
  <script type="text/javascript">
    var popupViews = document.querySelectorAll(".popup-view");
    var popupBtns = document.querySelectorAll(".popup-btn");
    var closeBtns = document.querySelectorAll(".close-btn");

    //javascript for quick view button
    var popup = function(popupClick) {
      popupViews[popupClick].classList.add("active");
    };

    popupBtns.forEach((popupBtn, i) => {
      popupBtn.addEventListener("click", () => {
        popup(i);
      });
    });

    //javascript for close button
    closeBtns.forEach((closeBtn) => {
      closeBtn.addEventListener("click", () => {
        popupViews.forEach((popupView) => {
          popupView.classList.remove("active");
        });
      });
    });

    function toggle() {
      var blur = document.getElementById("blur");
      blur.classList.toggle("active");
      var popup = document.getElementById("popup");
      popup.classList.toggle("active");
    }

    //Website dark/light theme
    const themeBtn = document.querySelector(".theme-btn");

    themeBtn.addEventListener("click", () => {
      document.body.classList.toggle("dark-theme");
      themeBtn.classList.toggle("sun");

      localStorage.setItem("saved-theme", getCurrentTheme());
      localStorage.setItem("saved-icon", getCurrentIcon());
    });

    const getCurrentTheme = () => document.body.classList.contains("dark-theme") ? "dark" : "light";
    const getCurrentIcon = () => themeBtn.classList.contains("sun") ? "sun" : "moon";

    const savedTheme = localStorage.getItem("saved-theme");
    const savedIcon = localStorage.getItem("saved-icon");

    if (savedTheme) {
      document.body.classList[savedTheme === "dark" ? "add" : "remove"]("dark-theme");
      themeBtn.classList[savedIcon === "sun" ? "add" : "remove"]("sun");
    }

    $(document).ready(function() {
      load_data();

      function load_data(page, type) {

        var type = "1";

        $.ajax({
          url: "../php/paginationcus.php",
          method: "POST",
          data: {
            page: page,
            type: type
          },
          success: function(data) {
            $('#pagination_data').html(data);
          }
        })
      }
      $(document).on('click', '.pagination_link', function() {
        var page = $(this).attr("id");
        load_data(page);
      });
    });

    $(document).ready(function() {
      load_data();

      function load_data(page, type) {

        var type = "2";

        $.ajax({
          url: "../php/paginationcus.php",
          method: "POST",
          data: {
            page: page,
            type: type
          },
          success: function(data) {
            $('#pagination_data2').html(data);
          }
        })
      }
      $(document).on('click', '.pagination_link', function() {
        var page = $(this).attr("id");
        load_data(page);
      });
    });


    $(document).ready(function() {
      load_data();

      function load_data(page, type) {

        var type = "3";

        $.ajax({
          url: "../php/paginationcus.php",
          method: "POST",
          data: {
            page: page,
            type: type
          },
          success: function(data) {
            $('#pagination_data3').html(data);
          }
        })
      }
      $(document).on('click', '.pagination_link', function() {
        var page = $(this).attr("id");
        load_data(page);
      });
    });

    $(document).ready(function() {
      load_data();

      function load_data(page, type) {

        var type = "4";

        $.ajax({
          url: "../php/paginationcus.php",
          method: "POST",
          data: {
            page: page,
            type: type
          },
          success: function(data) {
            $('#pagination_data4').html(data);
          }
        })
      }
      $(document).on('click', '.pagination_link', function() {
        var page = $(this).attr("id");
        load_data(page);
      });
    });

    $(document).ready(function() {
      load_data();

      function load_data(page, type) {

        var type = "5";

        $.ajax({
          url: "../php/paginationcus.php",
          method: "POST",
          data: {
            page: page,
            type: type
          },
          success: function(data) {
            $('#pagination_data5').html(data);
          }
        })
      }
      $(document).on('click', '.pagination_link', function() {
        var page = $(this).attr("id");
        load_data(page);
      });
    });

    $(document).ready(function() {
      load_data();

      function load_data(page, type) {

        var type = "6";

        $.ajax({
          url: "../php/paginationcus.php",
          method: "POST",
          data: {
            page: page,
            type: type
          },
          success: function(data) {
            $('#pagination_data6').html(data);
          }
        })
      }
      $(document).on('click', '.pagination_link', function() {
        var page = $(this).attr("id");
        load_data(page);
      });
    });

    $(document).ready(function() {
      load_data();

      function load_data(page, type) {

        var type = "7";

        $.ajax({
          url: "../php/paginationcus.php",
          method: "POST",
          data: {
            page: page,
            type: type
          },
          success: function(data) {
            $('#pagination_data7').html(data);
          }
        })
      }
      $(document).on('click', '.pagination_link', function() {
        var page = $(this).attr("id");
        load_data(page);
      });
    });

    $(document).ready(function() {
      load_data();

      function load_data(page, type) {

        var type = "8";

        $.ajax({
          url: "../php/paginationcus.php",
          method: "POST",
          data: {
            page: page,
            type: type
          },
          success: function(data) {
            $('#pagination_data8').html(data);
          }
        })
      }
      $(document).on('click', '.pagination_link', function() {
        var page = $(this).attr("id");
        load_data(page);
      });
    });

    $(document).ready(function() {
      load_data();

      function load_data(page, type) {

        var type = "9";

        $.ajax({
          url: "../php/paginationcus.php",
          method: "POST",
          data: {
            page: page,
            type: type
          },
          success: function(data) {
            $('#pagination_data9').html(data);
          }
        })
      }
      $(document).on('click', '.pagination_link', function() {
        var page = $(this).attr("id");
        load_data(page);
      });
    });
  </script>
  <script src="js/swiper-bundle.min.js"></script>
</body>

</html>