<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="../css/gallery.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="backbutton">
        <a href="index.html">
        <button class="back"><i class="fa fa-angle-left" aria-hidden="true"></i></button></a>
    </div>
    <div class="slider-container">
        <div class="left-slide">
            <div style="background-color: black;"> 
                <h1>Min1</h1>
                <p>black</p>
            </div>
            <div style="background-color:steelblue;">
                <h1>Min2</h1>
                <p>blue</p>
            </div>
            <div style="background-color: grey;">
                <h1>Min3</h1>
                <p>orange</p>
            </div>
            <div style="background-color: wheat;">
                <h1>Min4</h1>
                <p>brown</p>
            </div>
        </div>
        <div class="right-slide">
            <div style="background-image: url('https://lh3.googleusercontent.com/1nDaUU7jjD0nwa4A0GyYbSIGy504oTwiawSE4tPvrQ4Jw-pq-KWYbIqt_nmTzkFMxwqDXk4=w1080-h608-p-no-v0');"></div>
            <div style="background-image:  url('https://images.unsplash.com/photo-1461301214746-1e109215d6d3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');">
            </div>
            <div
                style="background-image: url('https://images.unsplash.com/photo-1493246507139-91e8fad9978e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');">
            </div>
            <div
                style="background-image: url('https://images.unsplash.com/photo-1502856755506-d8626589ef19?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');">
            </div>
        </div>
        <div class="action-button">
            <button class="down-button">
                <i class="fas fa-arrow-down"></i>
            </button>
            <button class="up-button">
                <i class="fas fa-arrow-up"></i>
            </button>
        </div>
    </div>
    <script src="../javascript/gallery.js"></script>
</body>