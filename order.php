<?php
session_start();
include "db_conn.php";

if(isset($_POST["add_order"]))
{
    if(isset($_SESSION["orders"]))
    {
        $item_array_id = array_column($_SESSION["orders"],"item_id");
        if(!in_array($_GET["id"],$item_array_id))
        {
            $count = count($_SESSION["orders"]);
            $item_array = array(
                'item_id'  => $_GET["id"],
                'item_name'  => $_POST["hidden_nm"],
                'item_price'  => $_POST["hidden_pri"],
                'item_qun'  => $_POST["quantity"]
    
            );
            $_SESSION["orders"][$count] = $item_array;
        }
        else{
            echo '<script>alert("Item Added")</script>';
            echo '<script>window.location="order.php"</script>';
        }
    }
    else{
        $item_array = array(
            'item_id'  => $_GET["id"],
            'item_name'  => $_POST["hidden_nm"],
            'item_price'  => $_POST["hidden_pri"],
            'item_qun'  => $_POST["quantity"]

        );
        $_SESSION["orders"][0] = $item_array;
    }
}

if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
    foreach( $_SESSION["orders"] as $keys => $values)
    {
        if($values["item_id"] == $_GET["id"])
        {
            unset($_SESSION["orders"][$keys]);
            echo '<script>alert("Item removed")</script>';
            echo '<script>window.location="order.php"</script>';

        }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<a href="home.php" class="btn btn-primary">back home</a>
<body>
    <div class="container" style="width:700px;">
    <h3 align="center">Orders</h3><br>
    <?php
    $que ="SELECT * FROM books ORDER BY id ASC";
    $result= mysqli_query($conn,$que);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result))
        {
       ?>
       <div class="row">
        <form method="post" action="order.php?action=add&id=<?php echo $row["id"]; ?>">
            <div style="border:1px solid #333; border-radius:2px;">
                   <h4 class="text-info"><?php echo $row["title"]; ?></h4>
                   <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>
                   <input type="text" name="quantity" class="form-control" value="1">
                   <input type="hidden" name="hidden_nm" value="<?php echo $row["title"]; ?>">
                   <input type="hidden" name="hidden_pri" value="<?php echo $row["price"]; ?>">
                   <input type="submit" name="add_order" style="margin=top:5px;" class="btn btn-success" value="Add order">
                   
                   
            </div><br>
        </form>
        </div>
      <?php
        }
    }
    ?>
    <div style="clear:both"></div><br>
    <h3>Order Details</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th width="40%"> Item Name</th>
                <th width="10%"> Quantity</th>
                <th width="20%"> price</th>
                <th width="15%"> Total</th>
                <th width="5%"> Action</th>
            </tr>
            <?php
            if(!empty($_SESSION["orders"]))
            {
                $total=0;
                foreach( $_SESSION["orders"] as $keys => $values)
                {
            ?>
            <tr>
                <td><?php echo $values["item_name"]; ?></td>
                <td><?php echo $values["item_qun"]; ?></td>
                <td>$ <?php echo $values["item_price"]; ?></td>
                <td><?php echo number_format($values["item_qun"] * $values["item_price"],2); ?></td>
                <td><a href="order.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-denger">remove</span></a></td>
             </tr>
             <?php
              $total = $total + ($values["item_qun"] * $values["item_price"]);
                }
            ?>
            <tr>
                <td colspan="3" align="right">Total</td>
                <td align="right">$ <?php echo number_format($total,2); ?></td>
                <td></td>
            </tr>
            
            <?php  } ?>
       </table>
     </div>
    </div><br>

</body>
</html>