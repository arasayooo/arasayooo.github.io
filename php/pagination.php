<?php

include 'db.php';

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
$sql = "SELECT * FROM serviceemp WHERE serviceType = '$type' AND status IN ('7', '8') ORDER BY date DESC LIMIT $start_from, $record_per_page;";
$result = mysqli_query($data, $sql);
$count = mysqli_num_rows($result);
$sql3 = "SELECT category FROM servicetype WHERE id = '$type';";
$query3 = mysqli_query($data, $sql3);
$fetch3 = mysqli_fetch_array($query3);

$output .= '<h2><span style="font-size:80%;">';
$output .= $fetch3['category'];
$output .= '</span><br /><span>Availability</span>';
$output .= '<span><a class="far fa-edit" href="../php/manageService.php?type=';
$output .= $type;
$output .= '" style="font-size: 120%; margin-left: 190px; color: #009dd2;"></a></span></h2>
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

$output .= '</table><br /><div align="left" style="position:fixed; top:560px;">';
$page_query = "SELECT * FROM serviceemp WHERE serviceType = '$type' ORDER BY date DESC;";
$page_result = mysqli_query($data, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records / $record_per_page);


$output .= '
            </tbody>
                  </table>
                  <div class="button" >
                     <div class="but2">';

if ($total_pages > 4) {
   $output .=  '<a href="#" class="add-cart-btn" style="cursor: not-allowed; bottom:-30px; left:60px; background: rgb(214, 49, 49); ">Maximum</a>';
} else {
   $output .=   '<a href="../php/serviceEmpForm.php?type=';
   $output  .=   $type;
   $output .=   '" class="add-cart-btn" style="bottom:-30px; left:60px;"> Setdate </a>';
}
$output .=           '</div>
                  </div>';

for ($i = 1; $i <= $total_pages; $i++) {
   $output .= "<span class='pagination_link' style='cursor:pointer; padding:4px 15px; border:1px solid white; border-radius: 10px;  background: #009dd2; color:white;' id='" . $i . "'>" . $i . "</span>";
}
$output .= '</div><br /><br />';
echo $output;
