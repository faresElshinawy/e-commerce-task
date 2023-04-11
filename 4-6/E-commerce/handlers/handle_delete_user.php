<?php
session_start();
    include_once '../core/functions.php';
    include_once '../core/validations.php';
    include_once '../database/conn.php';
if(checkrequestmethod('GET')){
    $id = sanitizeinput($_GET['id']);
    $row = getuserinfo($conn,$id);
    unlink('../uploaded/' . $row['image']);
    deleteuser($conn,$id);
    if($row['email'] === $_SESSION['auth']['email'] && $row['password'] === $_SESSION['auth']['password']){
        redirect("logout.php");
        die;
    }
    redirect('../users.php');
    die;
}else{
    $_SESSION['errors']['delete_user_mehtod'] = 'wrong request method';  
    redirect('../users.php');
    die;
}