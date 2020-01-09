 <?php
    include('dbconnection.php');
    session_start();
    if(!isset($_SESSION['email']))
    {
        header("Location: register.php");
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web&display=swap');
        *{ font-family: 'Titillium Web', sans-serif; }
        .product {
            border: 1px solid #eaeaec; margin: -1px 19px 3px -1px; padding: 10px;
            text-align: center; background-color: #efefef;
        }
        th { text-align: center; }
        td { text-align: center; }
    </style>
</head>
<body> 
<div class="container" style="width: 62%;">
    <h2>Cart Details</h2>
    <a href="empty_cart.php" >
        <input type="submit"  style="margin-top: 5px; float: right; " value="Empty Cart" class="btn btn-success"></a> <br><br>
    <table class="table table-bordered table table-hover">
    <thead>
        <tr>
           <th width="20%">Product Image</th>
            <th width="30%">Product Name</th>
            <th width="20%">Product Price</th>
            <th width="10%">Quantity</th>
            <th width="20%">Price </th>
        </tr>
    </thead>
    
    <?php
        $flag = false;
        $query = "SELECT F.Name as name, F.Price as price, F.Image as img, F.id as item_id, email, C.user_email, C.item_id, C.quantity as qnty FROM food_items F, users, cart C WHERE F.id = C.item_id and C.user_email = '".$_SESSION['email']."' and email = C.user_email";
    
        $tot_price = 0;
        $run_query = mysqli_query($connection, $query);
        while( $result = mysqli_fetch_assoc($run_query) )
        {
            if($result){ $flag = true;
    ?>
    
    <tbody>             
        <tr>
            <td><img src="<?php echo $result['img']; ?>" width="150px" height="100px" ></td>
            <td><?php echo $result['name']; ?></td>
            <td><?php echo "$".$result['price']; ?></td>
            <td><form method="POST" action="upd_qnty.php">
                <input type="number" value="<?php echo $result['qnty'];?>" name="quantity" class="btn btn-successs" >
                <input type="hidden" name="hidden_id" value="<?php echo $result['item_id']; ?>"></form>
            </td>
            <td><?php echo "$".$result['price'] * $result['qnty']; ?></td>
        </tr>
             <?php $tot_price += ($result['price'] * $result['qnty']); } } ?> 
    </tbody>
  </table> 
  
    <table class="table table-bordered">
    <thead>
        <tr>
           <th  width="81%" style="text-align: left;">TOTAL</th>
           <th><?php echo "$".$tot_price; ?></th>
        </tr>
    </thead> 
  </table> 
  
  <?php if($flag == true) { ?>
    <table class="table table-bordered">
    <thead>
        <tr>
           <th  width="20%" style="text-align: left;">Delivery Address</th>
           
           <?php 
                $qr = "SELECT address FROM users WHERE email='".$_SESSION['email']."';";
                $run_qr = mysqli_query($connection, $qr);
                $row = mysqli_fetch_assoc($run_qr);
                $address = $row['address'];
            ?>
           <th><?php echo $address; ?></th>
        </tr>
    </thead> 
  </table>
      <form method="POST" action="empty_cart.php">
            <input type="submit" style="float: right;" value="Order Now" class="btn btn-success">
      </form>

  <?php } else { ?>
      <a href="menu.php"><input type="submit" style="float: right;" value="Menu" class="btn btn-success"></a>
  <?php } ?>
</div>  
</body>
</html>
<?php 
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    mysqli_close($connection);
?>