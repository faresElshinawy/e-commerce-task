<?php
session_start();
include_once "../core/functions.php";  
include_once "../core/validations.php"; 
include_once "../database/conn.php"; 
$errors = [];
if(checkrequestmethod('POST')){
    foreach($_POST as $key => $value){
        $$key = sanitizeinput($value);
    }
    if(requireinput($name)){
        $errors['name'] = 'category name is require'; 
    }elseif(minlen($name,5)){
        $errors['name'] = 'category name must be greater than 5 characters';
    }elseif(maxlen($name,20)){
        $errors['name'] = 'category name must be smaller than 20 characters';
    }
    if(empty($errors)){
        insertnewcategory($conn,$name);
        redirect('../categories.php');
        die;
    }else{
        $_SESSION['errors'] = $errors;
        redirect('../add_categories.php');
        die;
    }
}else{
    $_SESSION['errors']['method'] = 'wrong request method';
    redirect('../add_categories.php');
    die;
}