<?php
    include('dbconnection.php');
    session_start();

    $qr = "SELECT id FROM users WHERE email = '".$_SESSION['email']."'";
    $run_qr = mysqli_query($connection, $qr);
    $row = mysqli_fetch_assoc($run_qr);
    $id = $row['id'];           
?>
<!DOCTYPE html>
<html>
<head>
    <title>Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    * {
      box-sizing: border-box;
    }
    
    body { width: 900px; margin: auto; }

    input[type=text], input[type=email], input[type=number], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }

    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }

    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
      .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }
    </style>
</head>
<body>

<h2>Account Details</h2>
<p>Please update the details if you want to change.</p>

<div class="container">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
              <?php  
                    $query = "SELECT * FROM users WHERE id = ".$id;
                    $run_query = mysqli_query($connection, $query);
                    while( $result = mysqli_fetch_assoc($run_query) )
                    {
                        if($result){ ?>
    <div class="row">
      <div class="col-25">       
        <label for="name">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" placeholder="Name" value="<?php  echo $result['full_name']; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="email">Email</label>
      </div>
      <div class="col-75">
        <input type="email" id="email" name="email" placeholder="Email Address" value="<?php  echo $result['email']; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">       
        <label for="name">Password</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="password" placeholder="Password" value="<?php  echo $result['password']; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="phone">Phone No</label>
      </div>
      <div class="col-75">
        <input type=number id="phone" name="phone" placeholder="Phone Number" value="<?php  echo $result['phone']; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">       
        <label for="name">Address</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="address" placeholder="Address" value="<?php  echo $result['address']; ?>">
      </div>
    </div>
    <?php } } ?>
    <div class="row"><br><br>
      <input type="submit" value="Save Changes">
    </div>
  </form>
</div>

</body>
</html>
<?php
    $email = $password = $name = $phone = $address = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email          =   test_input($_POST["email"]);
        $name           =   test_input($_POST["name"]);
        $password       =   test_input($_POST["password"]);
        $phone          =   test_input($_POST["phone"]); 
        $address        =   test_input($_POST["address"]); 
        
        $qry = "UPDATE users SET email='".$email."', full_name='".$name."', password=".$password.", phone=".$phone.", address='".$address."' WHERE id=".$id;
        $run_qry = mysqli_query($connection, $qry);
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