<?php
   include('dbconnection.php');
    session_start();

    $quantity = $name = $email = $item_id = "";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name       = test_input($_POST["hidden_name"]);
        $quantity   = test_input($_POST["quantity"]);
        $email      = $_SESSION['email'];
        
            $qr = "SELECT id FROM food_items WHERE Name='".$name."';";
            $run_qr = mysqli_query($connection, $qr);
            $row = mysqli_fetch_assoc($run_qr);
        
        $item_id = $row['id'];
        
        $query = "INSERT INTO cart(user_email, item_id, quantity) VALUES('".$email."', ".$item_id.", ".$quantity.")";
        $run_query = mysqli_query($connection, $query);
        
        header("Location: menu.php");
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