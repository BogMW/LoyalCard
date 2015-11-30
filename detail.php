<?php
include "header.php";
require_once ('config.php');

$number = $_GET['number'];
$result = $mysqli->query("SELECT series, number, start_date, end_date, status FROM table_1 WHERE number='$number'");
$rows = $result->fetch_assoc();
$result2 = $mysqli->query("SELECT summ, date FROM operations WHERE number='$number'");
$rows2 = $result2->fetch_assoc();

echo "<h1>Detail info by card #" .$number. "</h1>";

echo "<table class='table'>";
    echo "<tr>";
        echo "<th>Card series</th>";
        echo "<th>Card number</th>";
        echo "<th>Date of card issue</th>";
        echo "<th>Card expiration date</th>";
        echo "<th>Card status</th>";
    echo "</tr>";
    echo "<tr class=''>";
        echo "<td>" .$rows['series']. "</td>";
        echo "<td>" .$rows['number']. "</td>";
        echo "<td>" .$rows['start_date']. "</td>";
        echo "<td>" .$rows['end_date']. "</td>";
        echo "<td>" .$rows['status']. "</td>";
    echo "</tr>";
echo "</table>";

echo "<h2>Card usage history</h2>";
echo "<table class='table'>";
    echo "<tr>";
        echo "<th>Summ of operations</th>";
        echo "<th>Date fo use</th>";
    echo "</tr>";

do {
    echo "<tr class=''>";
        echo "<td>" .$rows2['summ']. "</td>";
        echo "<td>" .$rows2['date']. "</td>";
    echo "</tr>";
} while ($rows2 = $result2->fetch_assoc());


echo "</table>";


include "footer.php";