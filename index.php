<?php include 'header.php' ?>
<?php
require_once ('config.php');
include ('expiration.php');

?>

    <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dolorem, excepturi impedit libero nulla perspiciatis repudiandae rerum sed soluta voluptatibus! Amet facere facilis tempore? Alias facilis fugiat ipsam libero velit?</h2>


    <caption>Select all cards</caption>
    <input type="checkbox" id="select-all" class="select-all" name="select-all">
    <div class="buttons">
        <button  value="activate" class="activate" name="activate">Activate selected cards</button>
        <button  value="deactivate" class="deactivate" name="deactivate">Deactivate selected cards</button>
        <button  value="delete" class="" name="del-sel">Delete selected cards</button>
        <button  class="" name="del-all">Delete all cards</button>
    </div>
    <?php

    $result = $mysqli->query("SELECT series, number, start_date, end_date, status FROM table_1");
    $rows = $result->fetch_assoc();

    echo "<table class='table'>";
        echo "<tr>";
            echo "<th>Card series</th>";
            echo "<th>Card number</th>";
            echo "<th>Date of card issue</th>";
            echo "<th>Card expiration date</th>";
            echo "<th>Card status</th>";
        echo "</tr>";
?>


        <tr class='search-row'>
        <td><input id="search-series" class="form-inputs" name="search-series" type='text' maxlength='2' size='5' value=''></td>
        <td><input id="search-number" class="form-inputs" name="search-number" type='number' min='1' max='999999'></td>
            <td><input id="search-startDate" class="form-inputs" name="search-startDate" type='date'></td>
            <td><input id="search-endDate" class="form-inputs" name="search-endDate" type='date'></td>
            <td>
                <select id="search-status" class="form-inputs" name='search-status' size='1'>
                    <option selected value=''>All</option>
                    <option value='Active'>Active</option>
                    <option value='Inactive'>Inactive</option>
                    <option value='Expired'>Expired</option>
                </select>
                </td>
            </tr>


    <?php
    do  {
        echo "<tr class='table-rows'>";
            echo "<td><a href='detail.php?number=" . $rows['number'] . "'>" .$rows['series']. "</a></td>";
            echo "<td><a href='detail.php?number=" . $rows['number'] . "'>" .$rows['number']. "</a></td>";
            echo "<td><a href='detail.php?number=" . $rows['number'] . "'>" .$rows['start_date']. "</a></td>";
            echo "<td><a href='detail.php?number=" . $rows['number'] . "'>" .$rows['end_date']. "</a></td>";
            echo "<td><a href='detail.php?number=" . $rows['number'] . "'>" .$rows['status']. "</a></td>";
            echo "<td><input class='checked' type='checkbox' value='" .$rows['number']. "'></td>";
        echo "</tr>";
    } while ($rows = $result->fetch_assoc());


    echo "</table>";
    ?>
</div>


<?php include 'footer.php' ?>
