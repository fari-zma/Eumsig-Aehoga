<?php
    include('dbconnection.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <style>
        body { width: 1200px; margin: auto; }

        .wrapper{ width: 100%; }

        .login { width: 50%; float: left; }

        .account { width: 50%; float: right; }
        
        #address { height: 120px; }

        input[type=text], input[type=email], input[type=password], input[type=number]
        { width: 50%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; resize: vertical; }


        input[type=submit] {
            background-color: #4CAF50;  color: white;  padding: 12px 20px; border: none;  border-radius: 4px; cursor: pointer; float: inherit; 
        }

        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="login">
    <h1>Login</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input placeholder="Email Address" name="email" type="email"><br><br>
            <input placeholder="Password" name="password" type="password"><br><br>
            <input value="Login" type="submit" name="submit">
        </form>
    </div>
    
    <div class="account">
       <h1>Create Account</h1>
        <form action="signup.php" method="POST">
            <input placeholder="Full Name" name="name" id="name" type="text"> &nbsp;&nbsp;<br><br>
            <input placeholder="Phone Number" name="phone" id="phone" type="number"><br><br>
            <input placeholder="Email Address" name="email" id="email" type="email"> &nbsp;&nbsp;<br><br>
            <input placeholder="Password" name="password" id="password1" maxlength="100" type="password">&nbsp;&nbsp;<br><br>
            <input placeholder="Confirm Password" name="con_password" id="password2" maxlength="100" type="password"><br> 
            
            <div class="delivery_address">
            <h3>Delivery Address</h3>
            <input placeholder="Address" name="address" id="address" type="text">&nbsp;&nbsp;<br><br>
            <input name="Register" id="reg_submit" value="Create Account" type="submit" >
            </div>
        </form>
    </div>
</div>
</body>
</html>

<?php
    $email = $password = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email      =   test_input($_POST["email"]);
        $password   =   test_input($_POST["password"]);
        
                            // ADMIN LOGIN
        $ad_query = "SELECT * FROM admin";
        $ad_run_query = mysqli_query($connection, $ad_query);

        while( $result = mysqli_fetch_assoc($ad_run_query) )
        {
            if($result)
                if( ($result['email']==$email) && ($result['pass']==$password) )
                {
                    session_start();
                    $_SESSION['email'] = $email;
                    header("Location: admin_panel.php");
                }
        }

                        // USER LOGIN
        $us_query = "SELECT * FROM users";
        $us_run_query = mysqli_query($connection, $us_query);

        while( $result = mysqli_fetch_assoc($us_run_query) )
        {
            if($result)
                if( ($result['email']==$email) && ($result['password']==$password) )
                {
                    session_start();
                    $_SESSION['email'] = $email;
                    header("Location: index.php");
                }
        }
        
        echo "Invalid email or password";
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