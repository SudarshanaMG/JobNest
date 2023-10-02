<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
    header('location:login.php');
 }
 
 if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM `jobapplied` WHERE id1 = '$id'") or die('query failed');
    header('location:myjob.php');
 }
 
 ?>