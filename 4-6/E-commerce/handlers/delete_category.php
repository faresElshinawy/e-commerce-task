<?php
session_start();
include_once "../core/functions.php";  
include_once "../core/validations.php"; 
include_once "../database/conn.php"; 

if(checkrequestmethod('GET')){
    $id = sanitizeinput($_GET['id']);
    deletecategories($conn,$id);
    redirect('../categories.php');
}else{
    $_SESSION['errors']['method'] = 'wrong request method';
    redirect('../categories.php');
    die;
}