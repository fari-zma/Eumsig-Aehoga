<?php

    include('dbconnection.php');
    session_start();
    $query      =   "SELECT * FROM food_items ORDER BY id ASC";
    $run_query  =   mysqli_query($connection, $query);

?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Menu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
      .top_header { width: 100%; }
      h2 { width: 60%; float: left; }
      #cart { float: right; margin-left: 5px; margin-right: 5px; display: block;}
      input[type=submit]
        {
          background-color: #4CAF50;  color: white;  padding: 6px 10px; border: none;  border-radius: 4px; cursor: pointer; float: inherit; 
        }
       input[type=submit]:hover, input[type=file]:hover
            { background-color: #45a049; }
      table { width: 100%; padding: 10px; }
  </style>
</head>
<body>

<div class="container">
  <div class="top_header">
      <h2>FOOD ITEMS</h2>
      <a href="cart.php"><input id="cart" value="Cart" type="submit" class="btn btn-successs"></a>
      <a href="index.php"><input id="cart" value="Home" type="submit" class="btn btn-successs"></a>
   </div><br><br><br>        
  <table class="table table-bordered table table-hover">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Add to Cart</th>
      </tr>
    </thead>
    <tbody>
    
     <?php
        while( $result = mysqli_fetch_assoc($run_query) )
        { 
            if($result) {
     ?>
        
      <tr>
        <td><img src='<?php echo $result["Image"]; ?>' width="150" height="150" ></td>
        <td><?php echo "<b>".$result['Name']."</b>"."<br>".$result['description'] ; ?></td>
        <td><?php echo "$".$result['Price']; ?></td>
        <td>
            <?php if(!isset($_SESSION['email'])) { ?>
            <a href="register.php"><input type="submit" name="add" style="margin-top: 5px;" value="Add to Cart"></a>
             <?php } else { ?>  
                  <form method="POST" action="insrt_cart.php"> 
                    <input type="number" name="quantity" class="form-control" value="1">
                    <input type="hidden" name="hidden_name" value="<?php echo $result['Name']; ?>">
                    <input type="submit" name="add" style="margin-top: 5px;" value="Add to Cart">
                 </form>
            <?php } ?>
        </td>
      </tr>
      
      <?php
        } }
        mysqli_close($connection);
      ?>

    </tbody>
  </table>
</div>
</body>
</html>