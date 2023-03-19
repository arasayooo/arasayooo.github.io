<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style1.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Powerec Technology Service</title>
</head>
<body>
    <nav class="nav1">
        <div class="static">
            <div class="phonebutton">
                <button class="phone"><i class="fas fa-phone-alt"></i></button>
            </div>
            <p>07-386 3448</p>
            <div class="emailbutton">
                <button class="email"><i class="far fa-envelope"></i></button>
            </div>
            <p>powerec@email.com</p>
        </div>
    </nav>
    <nav class="nav">
        <div class="container">
            <h1 class="logo"><a href="index.html" style="font-size: 80%; color: white;">Powerec Technology Service
            </a></h1>
            <ul class="sort">
                <?php if(isset($_SESSION['id']))
                {
                    echo "<li><a href='login.php'>Service</a></li>";
                    echo "<li><a href='about'>Profile</a></li>";
                    echo "<li><a href='contact.php'>Quotation</a></li>";
                    echo "<li><a href='location'>Feedback</a></li>";
                    echo "<li><a href='gallery.php'>Manage User</a></li>";
                } else
                {
                    echo "<li><a href='login.php'>Login</a></li>";
                    echo "<li><a href='about'>About Us</a></li>";
                    echo "<li><a href='contact.php'>Contact</a></li>";
                    echo "<li><a href='location'>Location</a></li>";
                    echo "<li><a href='gallery.php'>Gallery</a></li>";
                } ?>
                
            </ul>
        </div>
    </nav>
</body>
</html>