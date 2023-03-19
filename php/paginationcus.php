<?php

include 'db.php';

session_start();

$record_per_page = 10;
$page = '';
$output = '';
$type = $_POST['type'];

//   echo '<pre>';
//   var_dump($type);
//   echo '</pre>';
//  exit();

if (isset($_POST["page"])) {
   $page = $_POST["page"];
} else {
   $page = 1;
}
$start_from = ($page - 1) * $record_per_page;

$sql1 = "SELECT * FROM serviceemp WHERE status = '7' AND serviceType = '$type';";
$statement = mysqli_stmt_init($data);
$prepare1 = mysqli_stmt_prepare($statement, $sql1);
mysqli_stmt_execute($statement);
$getresult1 = mysqli_stmt_get_result($statement);
$fetchs1 = mysqli_fetch_assoc($getresult1);
mysqli_stmt_close($statement);
$query1 = mysqli_query($data, $sql1);
$fetchh1 = mysqli_fetch_array($query1);

$sql = "SELECT * FROM serviceemp WHERE serviceType = '$type' AND status = '7' ORDER BY date DESC LIMIT $start_from, $record_per_page;";
$result = mysqli_query($data, $sql);
$count = mysqli_num_rows($result);

$sql3 = "SELECT category FROM servicetype WHERE id = '$type';";
$query3 = mysqli_query($data, $sql3);
$fetch3 = mysqli_fetch_array($query3);

$sql11 = "SELECT * FROM servicecus LEFT JOIN serviceemp ON servicecus.serviceid = serviceemp.serviceid WHERE serviceemp.serviceType = '$type';";
$statement = mysqli_stmt_init($data);
$prepare11 = mysqli_stmt_prepare($statement, $sql11);
mysqli_stmt_execute($statement);
$getresult11 = mysqli_stmt_get_result($statement);
$fetchs11 = mysqli_fetch_assoc($getresult11);
mysqli_stmt_close($statement);

$output .= '<h2><span style="font-size:80%;">';
$output .= $fetch3['category'];
$output .= '</span><br /><span>Availability</span>';
foreach ($getresult11 as $i => $fetch1) {
   if ($fetch1['id'] === $_SESSION['id']) {
      if ($fetch1['bookingid']) {
         $output .= '<span><a class="fas fa-eye" href="#" class="add-cart-btn" onclick="toggle()"';
         $output .= 'style="font-size: 120%; margin-left: 190px; color: #009dd2;"></a></span>';
      }
   }
}
$output .= '</h2>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Date</th>
                  <th scope="col">Time</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>';

$i = 1;
if ($page == 2) {
   $i = 11;
}
if ($page == 3) {
   $i = 21;
}
if ($page == 4) {
   $i = 31;
}
if ($page == 5) {
   $i = 41;
}
while ($row = mysqli_fetch_array($result)) {
   $output .= '   
               <tr>
                  <th scope="row"> ' . $i++ . ' </th>
                  <td align="center"> ' . $row["date"] . ' </td>
                  <td align="center"> ' . $row["time"] . ' </td>';
   $date = $row['date'];
   $time = $row['time'];
   $sql20 = "SELECT * FROM serviceemp LEFT JOIN status ON serviceemp.status = status.id WHERE serviceemp.date = '$date' AND serviceemp.time = '$time';";
   $run = mysqli_query($data, $sql20);
   $desc = mysqli_fetch_array($run);
   $output .= '<td align="center"> ' . $desc["status"] . ' </td>
               </tr>';
}

$output .= '</table><br /><div align="left" style="position:fixed; top:560px; ">';
$page_query = "SELECT * FROM serviceemp WHERE serviceType = '$type' ORDER BY date DESC;";
$page_result = mysqli_query($data, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records / $record_per_page);


$output .= '</tbody></table> <div class="button"> <div class="but2">';

if (!empty($fetchh1["date"])) {
   $output .= '<a href="../php/serviceCustomer.php?type=';
   $output .= $type;
   $output .= '" class="add-cart-btn" style=""><pre>Book Service</pre></a>';
} else {
   $output .= '<a href="service.php" class="add-cart-btn"><pre>No service available</pre></a>';
}
$output .= '</div></div>';

for ($i = 1; $i <= $total_pages; $i++) {
   $output .= "<span class='pagination_link' style='cursor:pointer; padding:4px 15px; border:1px solid white; border-radius: 10px;  background: #009dd2; color:white;' id='" . $i . "'>" . $i . "</span>";
}
$output .= '</div><br /><br />';
echo $output;
