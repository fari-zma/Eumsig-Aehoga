<?php
    include('dbconnection.php');
    session_start();
    if(!isset($_SESSION['email']))
    {
        header("Location: out_contact.php");
    }
    $query = "SELECT * FROM users";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    * {
      box-sizing: border-box;
    }
    
    body { width: 1000px; margin: auto; }

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

<h2>Contact Form</h2>
<p>Please fill up the form for contact us.</p>

<div class="container">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div class="row">
      <div class="col-25">
       
              <?php if(isset($_SESSION['email'])) 
                    {
                    $run_query = mysqli_query($connection, $query);
                    while( $result = mysqli_fetch_assoc($run_query) )
                    {
                        if($result)
                            if( $result['email'] == $_SESSION['email'] ) { ?>
       
        <label for="name">Full Name</label>
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
        <label for="phone">Phone No</label>
      </div>
      <div class="col-75">
        <input type=number id="phone" name="phone" placeholder="Phone Number" value="<?php  echo $result['phone']; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Subject</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
        
        <?php } } } ?>
        
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>

</body>
</html>
<?php
    $email = $password = $subject = $phone = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email      =   test_input($_POST["email"]);
        $name       =   test_input($_POST["name"]);
        $phone      =   test_input($_POST["phone"]);
        $subject    =   test_input($_POST["subject"]); 
        
            if($name=="" || $email=="" || $phone=="" || $subject=="" )
            {
                echo "Please enter your information";
            }
            else
            {
                echo "Thank Your for contacting us. We will soon solve your problem.";
            }
        
        $qry = "INSERT INTO message(email, name, phone, subject) VALUES('".$email."', '".$name."', ".$phone.", '".$subject."')";
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