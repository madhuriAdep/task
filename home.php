<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
?>

    <html>
    <a href="logout.php" style="align:right;">logout</a>
    <a href="list.php" style="align:right;">product list</a>
    <a href="order.php" style="align:right;">orders</a>
    <head>
        <title>home</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        
    </head>
       
    <body>
        <h1>Welcome, <?php echo $_SESSION['user_name'];?></h1>
        
    </body>

</html>
<?php
}
else{
    header("Location: index.php");
    exit();
}
?>