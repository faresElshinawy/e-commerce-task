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
        }elseif(minlen($password,6)){
            $errors['password'] = 'password must be greater than 5 characters';
        }elseif(maxlen($password,25)){
                $errors['password'] = 'password must be smaller than 25 characters';
        }

        if(empty($errors)){
            if($row = login($email,$password,$conn)){
                $_SESSION['auth'] = ['name' => $row['name'] , 'image' => $row['image'] , 'email' => $row['email'] , 'password' => $row['password']];
                redirect('../dashboard.php');
                die;
            }else{
                $_SESSION['errors']['wrong'] = 'wrong user info';
                redirect('../index.php');
                die;
            }
        }else{
            $_SESSION['errors'] = $errors;
            redirect('../index.php');
            die;
        }

}else{
    $_SESSION['errors'] = 'wrong request method';
    redirect('../index.php');
    die;
}