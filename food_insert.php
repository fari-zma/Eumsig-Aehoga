<?php
    include('dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body { background-color: white; margin-left: 30px; }
        input[type=text], input[type=number]
        { width: 50%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; resize: vertical; }
        input[type=submit], input[type=file]
        {
          background-color: #4CAF50;  color: white;  padding: 12px 20px; border: none;  border-radius: 4px; cursor: pointer; float: inherit; 
        }
        input[type=submit]:hover, input[type=file]:hover
            { background-color: #45a049; }
    </style>
</head>
<body>
   <h2>Insert Food details here :</h2>
   
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input placeholder="Name..." name="name" type="text"><br><br>
        <input placeholder="Price..." name="price" type="number"><br><br>
        <input placeholder="Description..." name="description" type="text"><br><br>
        <input value="Choose Image" type="file" name="image"><br><br><br>
        <input value="Insert" type="submit" name="submit">
    </form>
    
</body>
</html>


<?php
    $name = $description = $image = $price = "";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name           =   test_input($_POST["name"]);
        $description    =   test_input($_POST["description"]);
        $price          =   test_input($_POST["price"]);
        $image          =   test_input($_POST["image"]);
        $images         =   "Images/".$image;
        
        $query = "INSERT INTO food_items(Name, description, Image, Price) VALUES('".$name."', '".$description."', '".$images."', ".$price.")";
        $run_query = mysqli_query($connection, $query);
        echo "Item inserted Successfully";
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