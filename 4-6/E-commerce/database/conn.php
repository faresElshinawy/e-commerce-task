<?php

// host name
const HOST = "localhost";
// user name
const USER = "root";
// password
const PASSWORD = '';
// database name
const DB_NAME = 'e-commerce';

// database connection function

function db_conn(){
    $conn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME);
    if(!$conn){
        $_SESSION['errors']['database_conn_error'] = 'error with database connection' . mysqli_error();
        header("location: 404.php");
        die('error with database connection' . mysqli_error($conn));
    }
        return $conn;      
}
// data base conn varibale

$conn = db_conn();

// // create database function

// function create_database(){

//     $conn = mysqli_connect(HOST,USER,PASSWORD);
//     $create_database_sql = "CREATE DATABASE IF NOT EXISTS `E-commerce`";
//     $create = mysqli_query($conn,$create_database_sql);

//     if(!$create){
//         $_SESSION['errors'] = ['field to create the database'];
//     }

// }


//     // database create users table

    $user_table = "CREATE TABLE IF NOT EXISTS `users`(
        `id` INT PRIMARY KEY AUTO_INCREMENT ,
        `name` VARCHAR(20) NOT NULL,
        `email` VARCHAR(100) NOT NULL,
        `password` VARCHAR(50) NOT NULL,
        `image` VARCHAR(100) NOT NULL,
        `date`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        `phone` INT NOT NULL,
        `address` VARCHAR(100) NOT NULL
        )";

        mysqli_query($conn,$user_table);

    // database create categorys table

        $category_table = "CREATE TABLE IF NOT EXISTS `categories`(
            `cate_id` INT PRIMARY KEY AUTO_INCREMENT ,
            `name` VARCHAR(100) NOT NULL ,
            `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        mysqli_query($conn,$category_table);

//     // database create products table

        $product_table = "CREATE TABLE IF NOT EXISTS `products`(
            `pro_id` INT PRIMARY KEY AUTO_INCREMENT ,
            `name` VARCHAR(100) NOT NULL ,
            `description` VARCHAR(200) NOT NULL ,
            `image` VARCHAR(100) NOT NULL ,
            `count` INT NOT NULL ,
            `price` INT NOT NULL ,
            `category_id` INT NOT NULL,
            FOREIGN KEY (category_id) REFERENCES categories(cate_id),
            `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        mysqli_query($conn,$product_table);
?>