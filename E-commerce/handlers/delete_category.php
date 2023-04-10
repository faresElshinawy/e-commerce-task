<?php
session_start();
include_once "../core/functions.php";  
include_once "../core/validations.php"; 
include_once "../database/conn.php"; 

if(checkrequestmethod('GET')){
    $id = sanitizeinput($_GET['id']);
    deletecategorys($conn,$id);
    redirect('../categorys.php');
}else{
    $_SESSION['errors']['method'] = 'wrong request method';
    redirect('../categorys.php');
    die;
}