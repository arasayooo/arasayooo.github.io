<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/headerafterlogin.css">
   <title>Document</title>
</head>

<header>
   <div class="nav-bar">
      <a href="#" class="logo" style="font-size: 140%;">POWEREC </a>
      <div class="navigation">
         <div class="nav-items">
            <div class="nav-close-btn"></div>
            <a href="aftercustomer.php">Home</a>
            <a href="#about">View Book</a>
            <a class="active" href="service.php">Services</a>
            <a href="../php/logout.php">Logout</a>
         </div>
      </div>
      <div class="nav-menu-btn"></div>
   </div>
</header>

<body>

</body>

<script>
   const menuBtn = document.querySelector(".nav-menu-btn");
   const closeBtn = document.querySelector(".nav-close-btn");
   const navigation = document.querySelector(".navigation");
   const navItems = document.querySelectorAll(".nav-items a");

   menuBtn.addEventListener("click", () => {
      navigation.classList.add("active");
   });

   closeBtn.addEventListener("click", () => {
      navigation.classList.remove("active");
   });

   navItems.forEach((navItem) => {
      navItem.addEventListener("click", () => {
         navigation.classList.remove("active");
      });
   });
</script>

<!-- <script src="js/swiper-bundle.min.js"></script>
<script src="js/main.js"></script> -->

</html>