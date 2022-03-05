
<?php
$insert = false;
if(isset($_POST['name'])){


    // Connection Variable 
 $server = "localhost";
 $username = "root";
 $password = "";

    // Create a database connection

 $con = mysqli_connect($server,$username,$password);


 //Check for connection success

if (!$con) {
    die("Connection to this database failed ude to ".mysqli_connect_error());
    # code...
}

// Post Variables
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$desc = $_POST['desc'];

// echo "Conncetion Successfull";
  $sql ="INSERT INTO `tripdata`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
  VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

//Executing Query
  if($con->query($sql)==true)
  {
      $insert=true;
  }
  else{
      echo "ERROR : $sql <br> $con->error ";
      
  }

  // Closing Database connection
  $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
   
    <header>
   
     <h1>Welcome to Explore the Globe</h1>
         
    </header>
    <img class="bg" src="Travel.jpg" alt="Travel">
    <!-- <img class="bg" src="trv.jpg" alt="Travel"> -->

    <div class="container">
        <!-- <h1>Welcome to Explore the Globe</h1> -->
        <p>Enter your details to confirm your participation in the trip</p>
        <?php 
        if($insert == true){
         echo "<p class='submitMsg'>Thanks for Submitting your form, we are happy to see you joining this trip to travel the globe</p>";}
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter Your Review or any concern here"></textarea>
            <br> <br> <button class="btn">Submit</button>
          
        </form>
    </div>
    <footer>
       <h3>&copy Copyright. All right reserved</h3> 

    </footer>


    
    <script src="script.js"></script>
    
</body>

</html>
