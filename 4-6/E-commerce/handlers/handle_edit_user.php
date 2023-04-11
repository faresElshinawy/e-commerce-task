<?php
session_start();
include_once '../core/functions.php';
include_once '../core/validations.php';
include_once '../database/conn.php';
$errors = [];

if(checkrequestmethod('POST')){
    foreach($_POST as $key => $value){
        $$key = sanitizeinput($value);
    }
    // first name validate
    if(requireinput($firstname)){
        $errors['firstname'] = 'first name is require';
    }elseif(minlen($firstname,2)){
        $errors['firstname'] = 'first name must be greater than 2 characters';
    }elseif(maxlen($firstname,10)){
        $errors['firstname'] = 'firs tname must be smaller than 10 characters';
    }
    // last name validate
    if(requireinput($lastname)){
        $errors['lastname'] = 'last name is require';
    }elseif(minlen($lastname,2)){
        $errors['lastname'] = 'last name must be greater than 2 characters';
    }elseif(maxlen($lastname,10)){
        $errors['lastname'] = 'last tname must be smaller than 10 characters';
    }
    // address validate
    if(requireinput($address)){
        $errors['address'] = 'address is require';
    }elseif(maxlen($address,30)){
        $errors['address'] = 'address must be smaller than 30 characters';
    }elseif(minlen($address,10)){
        $errors['address'] = "address must be greater than 10 characters";
    }
    // email validate
    if(requireinput($email)){
        $errors['email'] = 'email is require';
    }elseif(emailvalidate($email)){
        $errors['email'] = 'please enter a valid email';
    }elseif(maxlen($email,30)){
        $errors['email'] = 'email must be smaller than 30 characters';
    }
    // password validate
    if(requireinput($password)){
        $errors['password'] = 'password is require';
    }elseif(!$password == $password_repeat){
        $errors['password'] = 'please make sure that password and password repeat is look like each other';
    }elseif(minlen($password,6)){
        $errors['password'] = 'password must be greater than 5 characters';
    }elseif(maxlen($password,25)){
        $errors['password'] = 'password must be smaller than 25 characters';
    }
    // phone validate
    if(requireinput($phone)){
        $errors['phone'] = 'phone is require';
    }elseif(maxlen($phone,11)){
        $errors['phone'] = 'please enter a valid phone number in egypt';
    }elseif(minlen($phone,11)){
        $errors['phone'] = 'please enter a valid phone number in egypt';
    }
    // image validate
    if(!empty($_FILES['image']['name'])){
        $image_new_name = dealwithimage($_FILES['image'] , '../uploaded');
        unlink("../uploaded/" . $old_image);
    }else{
        $image_new_name = $old_name;
    }
    // insert new user to database
    if(empty($errors)){
    $data = ['id' => $id , 'name' => $firstname . ' ' . $lastname , 'email' => $email , 'password' => $password , 'phone' => $phone , 'address' => $address , 'image' => $image_new_name];
        updateuser($conn,$data);
        if(userauthcheck($conn,$id)){
            $_SESSION['auth']['image'] = $image_new_name;
        }
        redirect('../users.php');
        die;
    }else{
        $_SESSION['errors'] = $errors;
        redirect("../edit_user.php?id=$id");
        die;
    }
}else{
    $_SESSION['errors'] = ['wrong request method'];
    redirect('../register.php');
    die;
}
