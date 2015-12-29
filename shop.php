<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="css/shop-style.css" rel="stylesheet">
    <script src='js/jquery-2.1.3.min.js'></script>
    <script src="js/clock.js"></script>
    <script src="js/shop.js"></script>
    <script src="js/filter.js"></script>

</head>
<body>

<div class="shop-container">


<?php
require_once ('config.php');
?>

<div id="login-popup" class="login-popup">
    <div class="popup-container">
        <h1>Enter your series and number</h1>
        <div class="popup-inputs">
            <input id="series" type="text" size="2" maxlength="2" value="AA">
            <input id="number" type="number" size="2" aria-valuemax="9999999999" value="0050906598">
            <button class="popup-enter" onclick="enterToShop(document.getElementById('series').value, document.getElementById('number').value)">Enter</button>
        </div>
        <div id="clock" class="clock">
            <span class="hour">00</span>:<span class="min">00</span>:<span class="sec">00</span>
        </div>
    </div>
</div>

<div id="cartContainer" class="cart-container">
<div class="cart-id">
    <div id="cart-series" class="cart-series">XX</div>
    <div id="cart-number" class="cart-number">9999999999</div>
</div>
</div>


<div id="products" class="products">

</div>

<script>
    var pageClock = new Clock({
        elem: document.getElementById('clock')
    });
    pageClock.start();
</script>

<script>
        Creator();
</script>


    <?php
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    require_once('config.php');
    $number = $_POST['cartNumber'];
    $summ = $_POST['cartSumm'];

    if ($summ == 0) {
        echo "alert('Add some to cart')";
    } else {
        $mysqli->query("INSERT INTO operations
(number, summ, date)
VALUES
('$number', '$summ' , CURRENT_TIMESTAMP )
");
    }
    }
    ?>
</div>


</body>
</html>