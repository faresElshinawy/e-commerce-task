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
        $errors['name'] = 'product name is require'; 
    }elseif(minlen($name,5)){
        $errors['name'] = 'product name must be greater than 5 characters';
    }elseif(maxlen($name,20)){
        $errors['name'] = 'product name must be smaller than 20 characters';
    }
    if(requireinput($description)){
        $errors['description'] = 'product description is require'; 
    }elseif(minlen($description,10)){
        $errors['description'] = 'product description must be greater than 10 characters';
    }elseif(maxlen($description,100)){
        $errors['description'] = 'product description must be smaller than 100 characters';
    }
    if(requireinput($count)){
        $errors['count'] = 'product count is require'; 
    }
    if(requireinput($price)){
        $errors['price'] = 'product price is require'; 
    }
    if(!empty($_FILES['image']['name'])){
        $image_new_name = dealwithimage($_FILES['image'],'../uploaded');
        unlink("../uploaded/" . $old_image);
    }else{
        $image_new_name = $old_image;
    }
    if(empty($errors)){
        $data = ['name' => $name , 'description' => $description , 'image' => $image_new_name , 'price' => $price , 'count' => $count , 'category_id' => $category_id];
        editproduct($conn,$data,$id);
        redirect('../products.php');
        die;
    }else{
        $_SESSION['errors'] = $errors;
        redirect("../edit_products.php?id=$id");
        die;
    }
}else{
    $_SESSION['errors']['method'] = 'wrong request method';
    redirect('"../edit_products.php?id=$id"');
    die;
}