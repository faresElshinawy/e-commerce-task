<?php

// usre function

function inserttousers($conn,$data){
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        $phone = $data['phone'];
        $address = $data['address'];
        $image = $data['image'];
        $sql = "INSERT INTO users(name,email,password,image,phone,address) VALUES ('$name' , '$email' , '$password', '$image' , '$phone' , '$address')";
        mysqli_query($conn,$sql);
    }
    
function updateuser($conn,$data){
    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];
    $phone = $data['phone'];
    $address = $data['address'];
    $image = $data['image'];
    $sql = "UPDATE users SET name = '$name' , email = '$email' , password = '$password' , image = '$image' , phone = '$phone' , address = '$address' where id = '$id'";
    mysqli_query($conn,$sql);
}

function deleteuser($conn,$id){
$sql = "DELETE FROM users WHERE id = '$id'";
mysqli_query($conn,$sql);
}

function selectallusrs($conn){
    $sql = 'SELECT * FROM users';
    $result = mysqli_query($conn,$sql);
    return $result;
}

function searchforuser($conn,$name){
    $sql = "SELECT * FROM users WHERE name = '$name'";
    $result = mysqli_query($conn,$sql);
        return $result;
}

function getuserinfo($conn,$id){
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function userauthcheck($conn,$id){
    $row = getuserinfo($conn,$id);
    if($row && $row['id'] == $id){
        return true;
    }
    return false;
}

// login function

function login($email,$password,$conn){
    $sql = "SELECT * FROM users WHERE email = '$email' && password = '$password'";
    $result = mysqli_query($conn,$sql);
    if($row = mysqli_fetch_assoc($result)){
        return $row;
    }
    return false;
}

// image function

function dealwithimage($file,$new_path){
    $image_name = $file['name'];
    $image_tmp_name = $file['tmp_name'];
    $image_type = $file['type'];
    $image_error = $file['error'];
    $image_size = $file['size'];
    if($image_error == 0){
        $path = pathinfo($image_name);
        $ext = $path['extension'];
        $old_image_name = $path['filename'];
        $image_check_type = getimagesize($image_tmp_name);
        $allowed_extensions = ['image/jpg' , 'image/png' , 'image/gif'];
        if(!$image_check_type){
            $GLOBAL['errors']['image'] = 'file must be of type image';
        }
        if(!in_array($image_check_type['mime'],$allowed_extensions)){
            $GLOBAL['errors']['image'] = 'file type is not allowed';
        }
        if(empty($errors)){
            $image_new_name = uniqid('',true) .  $old_image_name . '.' . $ext;
            move_uploaded_file($image_tmp_name , $new_path . '/' . $image_new_name);
            return $image_new_name;
        }
    }else{
        $GLOBAL['errors']['image'] = 'please choose another image';
    }
}

// category function

function getcategoriesinfo($conn){
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($conn,$sql);
    return $result;
}

function deletecategories($conn,$id){
    $sql = "DELETE FROM categories WHERE id = '$id'";
    mysqli_query($conn,$sql);
    }
    

function insertnewcategory($conn,$data){
    $sql = "INSERT INTO categories(name) VALUES ('$data')";
    mysqli_query($conn,$sql);
}

function getcategorybyid($conn,$id){
    $sql = "SELECT * FROM categories WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function editcategory($conn,$data,$id){
    $sql = "UPDATE categories SET name = '$data' WHERE id = $id";
        mysqli_query($conn,$sql);

}

function getcategoryproducts($conn,$id){
    $sql = "SELECT * FROM products WHERE category_id = '$id'";
    $result = mysqli_query($conn,$sql);
    return $result;
}

// product function

function getproductsinfo($conn){
    $sql = "SELECT * FROM products ";
    $result = mysqli_query($conn,$sql);
    return $result;
}

function deleteproduct($conn,$id){
    $sql = "DELETE FROM products WHERE id = '$id'";
    mysqli_query($conn,$sql);
    }
    

function insertnewproduct($conn,$data){
    $name = $data['name'];
    $description = $data['description'];
    $image = $data['image'];
    $count = $data['count'];
    $price = $data['price'];
    $cate_id = $data['category_id'];
    $sql = "INSERT INTO products(name,description,image,count,price,category_id) VALUES ('$name','$description','$image','$count','$price','$cate_id')";
    mysqli_query($conn,$sql);
}

function getproductbyid($conn,$id){
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function editproduct($conn,$data,$id){
    $name = $data['name'];
    $description = $data['description'];
    $image = $data['image'];
    $count = $data['count'];
    $price = $data['price'];
    $cate_id = $data['category_id'];
    $sql = "UPDATE products SET name = '$name' , description = '$description' , image = '$image' , count = '$count' , price = '$price' , category_id = '$cate_id' WHERE id = '$id' ";
        mysqli_query($conn,$sql);

}