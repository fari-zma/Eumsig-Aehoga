<?php 
    include('dbconnection.php');
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $qr = "SELECT * FROM cart WHERE user_email = '".$_SESSION['email']."'";
        $date = date("Y-m-d h:i:sa");
        echo $qr;
        $run_qr = mysqli_query($connection, $qr);
        while( $rows = mysqli_fetch_assoc($run_qr) )
        {
            if($rows)
            {
                $qry = "INSERT INTO food_ordered(user_email, item_id, date) VALUES('".$rows['user_email']."', ".$rows['item_id'].", '".$date."')";
                $run_qry = mysqli_query($connection, $qry);
            }
        }
        
        $query = "DELETE FROM cart WHERE user_email = '".$_SESSION['email']."';";
        $run_query = mysqli_query($connection, $query);
        header("Location: end.php");
    }

    function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
      
    $query = "DELETE FROM cart WHERE user_email = '".$_SESSION['email']."';";
    $run_query = mysqli_query($connection, $query);
    header("Location: cart.php");

    mysqli_close($connection);
?>