<?php
session_start();
$servername = "127.0.0.1:3308";
$username = "root";
$password = "";
$dbname = "db_quotation";

//Create connection
$con = mysqli_connect ($servername, $username, $password, $dbname);


if(isset($_POST['submit']))
{
    $i_email = $_POST['i_email'];
    $i_category = $_POST['i_category'];
    $i_name = $_POST['i_name'];
    $i_amount = $_POST['i_amount'];
    $i_price = $_POST['i_price'];
    
    
    foreach($i_name as $index => $i_name)
    {
        
        // $i_name = $i_name;
        // $i_email = $i_email[$index];
        // $i_category = $i_category[$index];
        // $i_amount = $i_amount[$index];
        // $i_price = $i_price[$index];
        // $s_otherfiled = $empid[$index];

        $query = "INSERT INTO `tb_item`(`i_email`,`i_category`,`i_name`, `i_amount`, `i_price`) VALUES ('{$_POST['i_email'][$index]}','{$_POST['i_category'][$index]}','{$_POST['i_name'][$index]}','{$_POST['i_amount'][$index]}','{$_POST['i_price'][$index]}')";
        $query_run = mysqli_query($con, $query);
    }

    if($query_run)
    {
        $_SESSION['status'] = "Quotation created!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Quotation failed to create";
        header("Location: index.php");
        exit(0);
    }
}
?>