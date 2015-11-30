<?php

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    require_once ('config.php');
    $search_series = $_POST['search-series'];
    $search_number = $_POST['search-number'];
    $search_startDate = $_POST['search-startDate'];
    $search_endDate = $_POST['search-endDate'];
    $search_status = $_POST['search-status'];
    $filter = "";




    if ($search_series != '') {
        $filter = "WHERE series LIKE '%$search_series%'";
    }
    if ($search_number != '') {
        if ($filter != '') {
            $filter = $filter . " AND number LIKE '%$search_number%'";
        } else {
            $filter = "WHERE number LIKE '%$search_number%'";
        }
    }

    if ($search_startDate != '') {
        if ($filter != '') {
            $filter = $filter . " AND start_date LIKE '$search_startDate%'";
        } else {
            $filter = "WHERE start_date LIKE '$search_startDate%'";
        }
    }

    if ($search_endDate != '') {
        if ($filter != '') {
            $filter = $filter . " AND end_date LIKE '%$search_endDate%'";
        } else {
            $filter = "WHERE end_date LIKE '%$search_endDate%'";
        }
    }

    if ($search_status != '') {
        if ($filter != '') {
            $filter = $filter . " AND status LIKE '%$search_status%'";
        } else {
            $filter = "WHERE status LIKE '%$search_status%'";
        }
    }

    $result = $mysqli->query("SELECT series, number, start_date, end_date, status FROM table_1 $filter");

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


}
