<?php
    include('dbconnection.php');
    session_start();
    $query = "SELECT * FROM admin";
?>
<!doctype html>
<html>
<head>
	<title> Eumsig Aehoga </title>
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
   
    <div class="header">
       
        <div class="logo">
		    <h2> &nbsp &nbsp Eumsig Aehoga </h2>
        </div>
    
        <div class="navigation">
            <ul class="nav">
                <?php if(isset($_SESSION['email'])){ ?>
                <li><a href="logout.php">LOGOUT</a></li>
                <?php } else { ?>
                <li><a href="register.php">LOGIN</a></li>
                <?php } ?>
                
                <?php if(isset($_SESSION['email'])) { 
                    $run_query = mysqli_query($connection, $query);
                    while( $result = mysqli_fetch_assoc($run_query) )
                    {
                        if($result) {
                            if( $result['email'] == $_SESSION['email'] ) { ?>
                <li><a href="admin_panel.php">ADMIN PANEL</a></li>
                <?php } else{ ?>
                <li><a href="menu.php">MENU</a></li>
                <li><a href="account.php">ACCOUNT</a></li>
                <?php } } } } ?>
                
                <?php if(isset($_SESSION['email'])) { 
                      $flag = false;
                      $run_query = mysqli_query($connection, $query);
                      while( $result = mysqli_fetch_assoc($run_query) )
                      {
                        if($result) 
                            if( $result['email'] == $_SESSION['email'] )
                                $flag = true;
                      }
                      if($flag==false) { ?>
                <li><a href="contact.php">CONTACT</a></li> <?php } } ?>
                
                <?php if(!isset($_SESSION['email'])) { ?>
                <li><a href="menu.php">MENU</a></li>
                <li><a href="contact.php">CONTACT</a></li> <?php } ?>

            </ul>
        </div>
    </div>
    
	<div><img class="image" src="banner-1.jpg"></div>
	
	<div class="menu">
       <br><div>
            <h4> FOOD GALLERY </h4>
        </div><br>
    <div class="wrapper">
	    <div class="gallery">
                <img src="Images/01.jpg"  width="200" height="150">
                &nbsp &nbsp &nbsp
                <img src="Images/02.jpg"  width="200" height="150">
                &nbsp &nbsp &nbsp
                <img src="Images/03.jpg"  width="200" height="150">
                &nbsp &nbsp &nbsp
                <img src="Images/04.jpg"  width="200" height="150">
        </div><br>
            
        <div class="gallery">
                <img src="Images/05.jpg"  width="200" height="150">
                &nbsp &nbsp &nbsp
                <img src="Images/06.jpg"  width="200" height="150">
                &nbsp &nbsp &nbsp
                <img src="Images/07.jpg"  width="200" height="150">
                &nbsp &nbsp &nbsp
                <img src="Images/08.jpg"  width="200" height="150">
        </div><br>
            
        <div class="gallery">
                <img src="Images/09.jpg"  width="200" height="150">
                &nbsp &nbsp &nbsp
                <img src="Images/10.jpg"  width="200" height="150">
                &nbsp &nbsp &nbsp
                <img src="Images/11.jpg"  width="200" height="150">
                &nbsp &nbsp &nbsp
                <img src="Images/12.jpg"  width="200" height="150">
        </div>
	</div>
	</div>
	
</body>
</html>

<?php 
    mysqli_close($connection);
?>