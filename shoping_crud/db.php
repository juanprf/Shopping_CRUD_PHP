<?php
session_start();


$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'database_crud'
) or die(mysqli_erro($mysqli));

?>