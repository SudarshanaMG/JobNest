<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];
if(!isset($admin_id)){
    header('location:login.php');
 }
 
 if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM `joblist` WHERE id = '$id'") or die('query failed');
    header('location:admin_page.php');
 }
 
 ?>