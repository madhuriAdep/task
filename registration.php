<?php
require_once('db_conn.php')
?>
<!DOCTYPE html>
<html>
    <head>
        <title>User Registration</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <body>
        <div>
            <?php if(isset($_POST['create'])){
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $phonenumber = $_POST['phonenumber'];
                $password = $_POST['password'];

                $sql="INSERT INTO regusers (fname,lname,email,phonenumber,password) values(?,?,?,?,?)";
                $stmtinsert = $db->prepare($sql);
                $result=$stmyinsert->execute([$fname, $lname,$email,$phonenumber,$password]);
                
                if($result){
                    echo 'successfully saved.';
                }else{
                    echo 'not saved';
                }
                
            }?>
        </div>

        <div>
        <form action="process.php" method="post">
            <div class="container">

            <div class="row">
                <div class="col-sm-3">
            <h2>Registration</h2>
            <hr class="mb-3">
            <label>First Name </label>
            <input class="form-control" type="text" name="fname" placeholder="first Name" required><br>
            <label>Last Name </label>
            <input class="form-control" type="text" name="lname" placeholder="last Name" required><br>
            <label>Email </label>
            <input class="form-control" type="email" name="email" placeholder="email" required><br>
            <label>Phone Number </label>
            <input class="form-control" type="text" name="phonenumber" placeholder="Phone Number" required><br>
            <label>Password </label>
            <input class="form-control" type="password" name="password" placeholder="password"><br>
            <hr class="mb-3">
            <input class="btn btn-primary" type="submit" name="createregstration" value="sign up">
            </div>
            </div>
            </div>
        </form>
        </div>
    </body>

</html>