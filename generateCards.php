<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<?php
require_once ('config.php');
require_once ('checkSeries.php');
require_once ('checkNumberLength.php');
require_once ('zeroCardCountCheck.php');
include "header.php";
$series = $_POST['series'];
$quantity = $_POST['quantity'];
$date = date('Y-m-d, G:i:s');
$expiration = $_POST['expiration-select'];
$endDate = date('Y-m-d, G:i:s', strtotime($expiration));
$number = '';
$result = $mysqli->query("SELECT COUNT(*) FROM table_1");
$rowCountArr = $result->fetch_assoc();
$rowCount = $rowCountArr['COUNT(*)'];
$tableMaxRows = 9999999999;
$digitCount = strlen($tableMaxRows);
$zeroCount = new zeroCardCountCheck();

?>
<h1>Generate new cards</h1>
<form method="post" action="generateCards.php">
    <label>Enter card Series</label>
    <input name="series" type='text' maxlength='2' size='5' value='AA'><br />
    <label>Enter card quantity</label>
    <input name="quantity" type='number' min='1' max='<?php echo $tableMaxRows ?>' value="0"><br />
    <label>Enter expiration date</label>
    <select name='expiration-select' size='1'>
        <option selected value='12 month'>1 Year</option>
        <option value='6 month'>6 Month</option>
        <option value='1 month'>1 Month</option>
    </select>
    <br />
    <input type="submit" value="GENERATE">
</form>


<?php

if (($rowCount+$quantity)>=$tableMaxRows){
    $quantity = $tableMaxRows-$rowCount;
}

if ($zeroCount->zeroCountCheck($quantity) == 0) {
    $zeroCount->zeroCountCheck($quantity);
} else {

    for ($i = 0; $i < $quantity; $i++) {
        do {
            $number = rand(1, $tableMaxRows);
            $numCount = strlen($number);
            for ($j = 0; $j < $digitCount - $numCount; $j++) {
                $number = '0' . $number;
            }
            $checkNumber = new checkNumberLength();
            $checkNumber->checkNumber($number);
            if ($checkNumber->checkNumber($number) != $number) {
                echo $checkNumber->checkNumber($number);
                continue;
            }
            $result = $mysqli->query("SELECT number FROM table_1 WHERE number='$number'");
            $rows = $result->fetch_assoc();
        } while (!empty($rows));

        $checkSeries = new checkSeries();
        $series = $checkSeries->checkRecordSeries($series);

        $mysqli->query("INSERT INTO table_1
(series, number, start_date, end_date, status)
VALUES
('$series', '$number' , '$date', '$endDate', 'Active')
");
    }
}


if ($quantity > 0) {
    echo "$quantity ". "cards are created";
    echo "<br />";
    echo "Series is - ". "$series";
    echo "<br />";
    echo "Expiration - ". "$expiration";
    $quantity = 0;
}

include 'footer.php'
?>


