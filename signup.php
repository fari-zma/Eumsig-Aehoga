<?php
    include('dbconnection.php');
    $email = $password = $con_pswrd = $name = $phone = $address = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name           =   test_input($_POST["name"]);
        $phone          =   test_input($_POST["phone"]);
        $email          =   test_input($_POST["email"]);
        $password       =   test_input($_POST["password"]);
        $con_pswrd      =   test_input($_POST["con_password"]);
        $address        =   test_input($_POST["address"]);
        
        if($con_pswrd != $password)
        {
            echo "Please enter password correctly.";
        }
        
        $query = "INSERT INTO users(full_name, email, password, phone, address) 
                              VALUES('".$name."', '".$email."', ".$password.", ".$phone.", '".$address."')";
    
        $run_query = mysqli_query($connection, $query);
        session_start();
        $_SESSION['email'] = $email;
        header("Location: index.php");
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