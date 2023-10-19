<?php
$info = array(
    'host' => 'localhost',
    'user' => 'root',
    'password' => '123456789',
    'dbname' => 'db_ycf'
);
$conn = mysqli_connect($info['host'], $info['user'], $info['password'], $info['dbname']) or die('Error connection database!');
mysqli_set_charset($conn, 'utf8');