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
        editcategory($conn,$name,$id);
        redirect('../categories.php');
        die;
    }else{
        $_SESSION['errors'] = $errors;
        redirect("../edit_category.php?id=$id");
        die;
    }
}else{
    $_SESSION['errors']['method'] = 'wrong request method';
    redirect("../edit_category.php?id=$id");
    die;
}