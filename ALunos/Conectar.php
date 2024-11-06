<?php
$conn = new mysqli('localhost','root','','bd_senac');

    if ($conn->connect_error) {
        die('Connection failed'. $conn->connect_error);
    }
?>