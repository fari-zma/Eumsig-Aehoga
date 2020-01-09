<?php
   include('dbconnection.php');
    session_start();

    $quantity = $email = $item_id = "";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $item_id        = test_input($_POST["hidden_id"]);
        $quantity       = test_input($_POST["quantity"]);
        $email          = $_SESSION['email'];
        
        $query = "UPDATE cart SET quantity = ".$quantity." WHERE item_id = ".$item_id." and user_email = '".$email."'";
        $run_query = mysqli_query($connection, $query);
        
        header("Location: cart.php");
    }
        
    function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    mysqli_close($connection);
?>