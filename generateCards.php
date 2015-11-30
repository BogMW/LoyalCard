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
include "header.php";
?>
<h1>Generate new cards</h1>
<form method="post" action="generateCards.php">
    <label>Enter card Series</label>
    <input name="series" type='text' maxlength='2' size='5' value='AA'><br />
    <label>Enter card quantity</label>
    <input name="quantity" type='number' min='1' max='100' value="0"><br />
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
$series = $_POST['series'];
$quantity = $_POST['quantity'];
$date = date('Y-m-d, G:i:s');
$expiration = $_POST['expiration-select'];
$endDate = date('Y-m-d, G:i:s', strtotime($expiration));

for ($i = 0; $i < $quantity; $i++) {
    $mysqli->query("INSERT INTO table_1
(series, start_date, end_date, status)
VALUES
('$series', '$date', '$endDate', 'Active')
");
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


