<?php

    include('dbconnection.php');

    $query      =   "SELECT * FROM users ORDER BY id ASC";
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
  <h2>USERS</h2><br>           
  <table class="table table-bordered table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody>
    
     <?php
        while( $result = mysqli_fetch_assoc($run_query) )
        {
        if($result)
            for($i=0; $i<count($result); $i++) 
     ?>
        
      <tr>
        <td><?php echo $result['full_name'] ?></td>
        <td><?php echo $result['email'] ?></td>
        <td><?php echo $result['phone'] ?></td>
        <td><?php echo $result['address'] ?></td>
        <td>
           <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input value="<?php echo $result['email'] ?>" type="hidden" name="email">
                <input value="remove" type="submit" name="">
           </form>
        </td>
      </tr> <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>


<?php 

    $email="";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $email = $_POST['email'];
        $query = "DELETE FROM users WHERE email='".$email."'" ;
        $run_query = mysqli_query($connection, $query);
        header("Location: #");
    }

mysqli_close($connection);
?>