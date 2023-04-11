<?php

function requireinput($input){
    if(!empty($input)){
        return false;
    }
    return true;
}

function checkrequestmethod($request){
    if($_SERVER['REQUEST_METHOD'] == $request){
        return true;
    }
    return false;
}


function maxlen($input,$num){
    if(strlen($input) <= $num){
        return false;
    }
    return true;
}

function minlen($input,$num){
    if(strlen($input) >= $num){
        return false;
    }
    return true;
}

function emailvalidate($email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        return false;
    }
    return true;
}


function sanitizeinput($input){
    return trim(htmlspecialchars(htmlentities($input)));
}

function redirect($path){
    header("location: $path");
}