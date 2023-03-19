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
    $q_no = $_POST['q_no'];
    $name = $_POST['name'];
    $qty = $_POST['qty'];
    $unitprice = $_POST['unitprice'];
    $amount = $_POST['amount'];
    
    
    foreach($name as $i => $name) {
        
        // if ($i == 0) {
            
        // }
        // else {
        //     $query = "INSERT INTO `tb_item`(`i_name`, `i_qty`, `i_unitprice`, i_amount) VALUES ('{$_POST['i_email'][0]}','{$_POST['i_category'][0]}','{$_POST['i_name'][$i]}','{$_POST['i_amount'][$i]}','{$_POST['i_price'][$i]}', NOW())";
        // }
        // $name = $name[$i];
        // $qty = $qty[$i];
        // $unitprice = $unitprice[$i];
        // $amount = $amount[$i];

        // $query1 = "INSERT INTO `tb_item`
        //             SET q_no = (SELECT IF(MAX(q_no) IS NULL, 1, MAX(q_no) + 1) FROM table `tb_item`);";
        // $query_run = mysqli_query($con, $query1);

        $query2 = "INSERT INTO `tb_item` (q_no, i_name, i_qty, i_unitprice, i_amount) VALUES ('{$_POST['q_no']}', '{$_POST['name'][$i]}','{$_POST['qty'][$i]}','{$_POST['unitprice'][$i]}','{$_POST['amount'][$i]}')"; 
        $query_run = mysqli_query($con, $query2);
    }

    if($query_run)
    {
        $query3 = "INSERT INTO `tb_quotation` (q_no, q_status, q_date, q_category) VALUES ('{$_POST['q_no']}','Quotation Created', NOW(), 'Air-Conditioning')";
        $result = mysqli_query($con, $query3);
        $_SESSION['status'] = "Quotation created!";
        header("Location: crud_quotation.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Quotation failed to create";
        header("Location: crud_quotation.php");
        exit(0);
    }
}
?>