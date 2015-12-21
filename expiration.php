<?php
require_once ('config.php');

$numbers = array();
$result = $mysqli->query("SELECT number FROM table_1 WHERE end_date < CURRENT_TIMESTAMP");
$rows = $result->fetch_assoc();

do  {
    array_push($numbers, $rows['number']);
} while ($rows = $result->fetch_assoc());

foreach ($numbers as $value) {
    $result = $mysqli->query("UPDATE table_1 SET status='Expired' WHERE number='$value'");
}


