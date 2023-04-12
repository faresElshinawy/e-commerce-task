<?php

// usre function

// insert into users 

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
    
// update user data

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

// delete user

function deleteuser($conn,$id){
$sql = "DELETE FROM users WHERE id = '$id'";
mysqli_query($conn,$sql);
}

// get all users

function selectallusrs($conn){
    $sql = 'SELECT * FROM users ORDER BY date DESC';
    $result = mysqli_query($conn,$sql);
    return $result;
}

// get all users for dashboard

function selectallusrsdash($conn){
    $sql = 'SELECT * FROM users LIMIT 5';
    $result = mysqli_query($conn,$sql);
    return $result;
}

// get user info by id

function getuserinfo($conn,$id){
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

// check if user id in database or not

function userauthcheck($conn,$id){
    $row = getuserinfo($conn,$id);
    if($row && $row['id'] == $id){
        return true;
    }
    return false;
}

// *********************************************************************************

// login function

function login($email,$password,$conn){
    $sql = "SELECT * FROM users WHERE email = '$email' && password = '$password'";
    $result = mysqli_query($conn,$sql);
    if($row = mysqli_fetch_assoc($result)){
        return $row;
    }
    return false;
}

// *********************************************************************************

// image function

// deal with image

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
            $image_new_name = uniqid('',true) . '.' . $ext;
            move_uploaded_file($image_tmp_name , $new_path . '/' . $image_new_name);
            return $image_new_name;
        }
    }else{
        $GLOBAL['errors']['image'] = 'please choose another image';
    }
}


// *********************************************************************************

// category function

// get all category
function getcategoriesinfo($conn){
    $sql = "SELECT * FROM categories ORDER BY date DESC";
    $result = mysqli_query($conn,$sql);
    return $result;
}
// get category for dashboard
function getcategoriesinfodash($conn){
    $sql = "SELECT * FROM categories  LIMIT 4 ";
    $result = mysqli_query($conn,$sql);
    return $result;
}
// delete catgory
function deletecategories($conn,$id){
    $sql = "DELETE FROM categories WHERE cate_id = '$id'";
    mysqli_query($conn,$sql);
    }
    
// insert into category
function insertnewcategory($conn,$data){
    $sql = "INSERT INTO categories(name) VALUES ('$data')";
    mysqli_query($conn,$sql);
}
// get category by id
function getcategorybyid($conn,$id){
    $sql = "SELECT * FROM categories WHERE cate_id = '$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
// edit category info
function editcategory($conn,$data,$id){
    $sql = "UPDATE categories SET name = '$data' WHERE cate_id = $id";
        mysqli_query($conn,$sql);

}
// get category products
function getcategoryproducts($conn,$id){
    $sql = "SELECT * FROM products WHERE category_id = '$id'";
    $result = mysqli_query($conn,$sql);
    return $result;
}

// category add test

function categoriestest($conn){
    for($i = 1 ; $i < 10 ; $i++){
    $sql = "INSERT INTO categories(name) VALUES ('category_test')";
    mysqli_query($conn,$sql);
    }
}


// *********************************************************************************

// product function

// get all product
function getproductsinfo($conn){
    $sql = "SELECT pro_id , products.name  , description , image , count , price , products.date , categories.name cate_name  FROM products INNER JOIN categories ON cate_id = category_id  ORDER BY date DESC";
    $result = mysqli_query($conn,$sql);
    return $result;
}
// get products for dashboard file
function getproductsinfodash($conn){
    $sql = "SELECT * FROM products LIMIT 6";
    $result = mysqli_query($conn,$sql);
    return $result;
}
// delete product
function deleteproduct($conn,$id){
    $sql = "DELETE FROM products WHERE pro_id = '$id'";
    mysqli_query($conn,$sql);
    }
    
// insert into product
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
// get product by id 
function getproductbyid($conn,$id){
    $sql = "SELECT * FROM products WHERE pro_id = '$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
// edit product info
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
// get products count

function getproductcount($conn){
    $sql = "SELECT count(pro_id) count FROM products";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_fetch_assoc($result);
    return $count['count'];
}


// products insert test

function productstest($conn){
    for($i = 1 ; $i <= 10 ; $i++){
    $sql = "INSERT INTO products(name,description,image,count,price,category_id) VALUES ('product_test$i','test for products table','pexels-pixabay-256198.jpg','50','500','1')";
    mysqli_query($conn,$sql);
    }
}