<?php
    $server = "localhost";
    $database = "my_db";
    $user = "root";

        $mysqli = new mysqli($server, $user, "", $database);

        if ($mysqli->connect_error) {
            die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);

}
?>