<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="backbutton">
        <a href="index.php">
        <button class="back"><i class="fa fa-angle-left" aria-hidden="true"></i></button></a>
    </div>
    <div class="min"><div class="min"></div></div>
    <div class="container">
        <h1 style="color: orange;">Send us a message!</h1>
        <form action="../php/contact.php" method="post">
            <div class="form-contact">
                <input type="text" class="form-control" placeholder="First Name" name="firstname">
            </div>
            <div class="form-contact-right">
                <input type="text" class="form-control" placeholder="Last Name" name="lastname">
            </div>
            <div class="form-contact">
                <input type="text" class="form-control" placeholder="Email" name="email">
            </div>
            <div class="form-contact-right">
                <input type="text" class="form-control" placeholder="Phone" name="phone">
            </div>
            <div class="form-contact-below">
                <textarea type="text" class="form-control" placeholder="Message" name="message" cols="67" rows="6" id="messagebox"></textarea>
            </div>
            <button type="submit" class="sendbutton">Send Message</button>
        </form>
        <!-- <div id="status">Your message has been successfully sent.</div> -->
        <div class="info">
            <h1 style="color: black;">Info</h1>
            <p>60 Jalan Sena 1, Taman Rinting, Masai</p>
            <p>81750 Johor Bahru</p>
            <p>Johor, Malaysia</p>
            <p>07-386 3448</p>
            <p>powerec@email.com</p>
        </div>
    </div>
    <script src="../javascript/contact.js"></script>
</body>
</html>