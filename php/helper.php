<?php

include 'db.php';

$val = $_GET["value"];
$type = $_GET["type"];
$val_M = mysqli_real_escape_string($data, $val);

$sql2 = "SELECT date, time FROM serviceemp WHERE date = '$val_M' AND serviceType = '$type' AND status = '7';";
$result = mysqli_query($data, $sql2);

echo '<form action="serviceCustomer.php" method="post">';

if (mysqli_num_rows($result) > 0) {
   echo '<label>Available Time</label>';
   echo '<select type="text" class="form-control" name="time">';

   while ($rows = mysqli_fetch_assoc($result)) {
      echo "<option>" . $rows["time"] . "</option>";
   }

   echo "</select>";
} else {
   echo '<select type="text" class="form-control" name="time">
                <option value="">Select Time</option>
            </select>';
}
echo '</form>';
?>