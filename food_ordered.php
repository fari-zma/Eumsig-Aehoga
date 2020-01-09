<?php
    include('dbconnection.php');
    session_start();

    $query = "SELECT email, full_name, F.id as id, Name, Image, user_email, item_id, date 
              FROM users U, food_items F, food_ordered
              WHERE email=user_email and F.id = item_id
              ORDER BY food_ordered.id DESC";

        $run_query = mysqli_query($connection, $query);
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
      <h2>FOOD ORDERED</h2>
  </div><br>          
  <table class="table table-bordered table table-hover">
    <thead>
      <tr>
        <th>User Name</th>
        <th>User Email</th>
        <th>Item Name</th>
        <th>Item Image</th>
        <th>Ordered Date</th>
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
       <td><?php echo $result['full_name']; ?></td>
        <td><?php echo $result['user_email']; ?></td>
        <td><?php echo $result['Name'] ?></td>
        <td><img src="<?php echo $result['Image']?>" width="100px" height="100px;"></td>
        <td><?php echo $result['date'] ?></td>
        <td>
           <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input value="<?php echo $result['user_email'] ?>" type="hidden" name="email">
                <input value="<?php echo $result['item_id'] ?>" type="hidden" name="item_id">
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
    $item_id = $email = "";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $item_id    = $_POST['item_id'];
        $email      = $_POST['email'];
        
        $qry = "DELETE FROM food_ordered WHERE item_id=".$item_id." and user_email='".$email."'";
        $run_qry = mysqli_query($connection, $qry);
    }
    mysqli_close($connection);
?>