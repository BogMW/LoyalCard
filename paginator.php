<?php

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    require_once('config.php');
    require_once('paginator_class.php');
    $recordsCountSelected = $_POST['records-count'];
    $startRecord =  $_POST['start-record'];
    $paginator_class = new paginator();

    $result = $mysqli->query("SELECT series, number, start_date, end_date, status FROM table_1 LIMIT $recordsCountSelected");

    while ($rows = $result->fetch_assoc()) {
        echo "<tr class='table-rows'>";
        echo "<td><a href='detail.php?number=" . $rows['number'] . "'>" .$rows['series']. "</a></td>";
        echo "<td><a href='detail.php?number=" . $rows['number'] . "'>" .$rows['number']. "</a></td>";
        echo "<td><a href='detail.php?number=" . $rows['number'] . "'>" .$rows['start_date']. "</a></td>";
        echo "<td><a href='detail.php?number=" . $rows['number'] . "'>" .$rows['end_date']. "</a></td>";
        echo "<td><a href='detail.php?number=" . $rows['number'] . "'>" .$rows['status']. "</a></td>";
        echo "<td><input type='checkbox' value='" .$rows['number']. "'></td>";
        echo "</tr>";
    }

    $result = $mysqli->query("SELECT COUNT(*) FROM table_1");
    $rowCountAr = $result->fetch_assoc();
    $recordsCount = $rowCountAr['COUNT(*)'];
    $paginator_class->checkRecordCount($recordsCount,$recordsCountSelected);

}






