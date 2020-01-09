<?php

    include('dbconnection.php');

    $query      =   "SELECT * FROM food_items ORDER BY id ASC";
    $run_query  =   mysqli_query($connection, $query);

?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
      input[type=submit]
        {
          background-color: #4CAF50;  color: white;  padding: 6px 10px; border: none;  border-radius: 4px; cursor: pointer; float: inherit; 
        }
       input[type=submit]:hover, input[type=file]:hover
            { background-color: #45a049; }
  </style>
</head>
<body>

<div class="container">
  <div class="top_header">
      <h2>FOOD ITEMS</h2>
  </div><br><br>          
  <table class="table table-bordered table table-hover">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Remove</th>
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
        <td><?php echo "$".$result['Price'] ?></td>
        <td>
           <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input value="<?php echo $result['Name'] ?>" type="hidden" name="name">
                <input value="remove" type="submit" name="">
           </form>
        </td>
      </tr> <?php } } ?>
    </tbody>
  </table>
</div>
</body>
</html>


<?php 

    $name="";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $email = $_POST['name'];
        $query = "DELETE FROM food_items WHERE Name='".$email."'" ;
        $run_query = mysqli_query($connection, $query);
    }

mysqli_close($connection);
?>