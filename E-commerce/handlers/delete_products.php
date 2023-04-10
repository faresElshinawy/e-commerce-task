<?php
session_start();
include_once "../core/functions.php";  
include_once "../core/validations.php"; 
include_once "../database/conn.php"; 

if(checkrequestmethod('GET')){
    $id = sanitizeinput($_GET['id']);
    $row = getproductbyid($conn,$id);
    unlink('../uploaded/' . $row['image']);
    deleteproduct($conn,$id);
    redirect('../products.php');
}else{
    $_SESSION['errors']['method'] = 'wrong request method';
    redirect('../products.php');
    die;
}