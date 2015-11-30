<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    require_once('config.php');
    $number = $_POST['number'];
    $button = $_POST['button'];

switch ($button) {
    case activate:
        if  (!empty($number)) {
            foreach ($number as $value) {
                $result = $mysqli->query("UPDATE table_1 SET status='Active' WHERE number='$value'");
            }
        }
        break;
    case deactivate:
        if  (!empty($number)) {
            foreach ($number as $value) {
                $result = $mysqli->query("UPDATE table_1 SET status='Inactive' WHERE number='$value'");
            }
        }
        break;
    case delete:
        if  (!empty($number)) {
            foreach ($number as $value) {
                $result = $mysqli->query("DELETE FROM table_1 WHERE number='$value'");
            }
        }
        break;
}

        $result = $mysqli->query("SELECT series, number, start_date, end_date, status FROM table_1");
        while ($rows = $result->fetch_assoc()) {
            echo "<tr class='table-rows'>";
            echo "<td><a href='detail.php?number=" . $rows['number'] . "'>" .$rows['series']. "</a></td>";
            echo "<td><a href='detail.php?number=" . $rows['number'] . "'>" .$rows['number']. "</a></td>";
            echo "<td><a href='detail.php?number=" . $rows['number'] . "'>" .$rows['start_date']. "</a></td>";
            echo "<td><a href='detail.php?number=" . $rows['number'] . "'>" .$rows['end_date']. "</a></td>";
            echo "<td><a href='detail.php?number=" . $rows['number'] . "'>" .$rows['status']. "</a></td>";
            echo "<td><input class='checked' type='checkbox' value='" .$rows['number']. "'></td>";
            echo "</tr>";
        }
}