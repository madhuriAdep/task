<?php
include('db_conn.php');
if (isset($_POST["create"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $sqlInsert = "INSERT INTO books(title , author , type , description, price) VALUES ('$title','$author','$type', '$description','$price')";
    if(mysqli_query($conn,$sqlInsert)){
        session_start();
        $_SESSION["create"] = "Book Added Successfully!";
        header("Location:list.php");
    }else{
        die("Something went wrong");
    }
}
if (isset($_POST["edit"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sqlUpdate = "UPDATE books SET title = '$title', type = '$type', author = '$author', description = '$description' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "Book Updated Successfully!";
        header("Location:list.php");
    }else{
        die("Something went wrong");
    }
}
if (isset($_POST["createregstration"])) {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phonenumber = mysqli_real_escape_string($conn, $_POST["phonenumber"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $sqlInsert = "INSERT INTO regusers(fname , lname , email , phonenumber,password) VALUES ('$fname','$lname','$email', '$phonenumber','$password')";
    if(mysqli_query($conn,$sqlInsert)){
        session_start();
        $_SESSION["createregstration"] = "Registred Successfully!";
        header("Location:index.php");
    }else{
        die("Something went wrong");
    }
}
?>