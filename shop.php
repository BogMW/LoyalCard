<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="css/shop-style.css" rel="stylesheet">
    <script src="js/clock.js"></script>
    <script src="js/shop.js"></script>
</head>
<body>

<div class="shop-container">


<?php
require_once ('config.php');
?>

<div class="login-popup">
    <div class="popup-container">
        <h1>Enter your series and number</h1>
        <div class="popup-inputs">
            <input type="text" size="2" maxlength="2">
            <input type="number" size="2" aria-valuemax="9999999999">
            <button class="popup-enter">Enter</button>
        </div>
        <div id="clock" class="clock">
            <span class="hour">00</span>:<span class="min">00</span>:<span class="sec">00</span>
        </div>
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


</div>


</body>
</html>