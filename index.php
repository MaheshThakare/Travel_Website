<?php
$insert = false;
if(isset($_POST['name'])){
    //Set connection variables
    $server= "localhost";
    $username= "root";
    $password= "";

    //Create data base connection
    $con= mysqli_connect($server, $username, $password);

    //Check for connection success
    if(!$con){
        die("connection to this database failed due to". mysqli_connect_error());
    }
    // echo "Success connecting to the db";   //for debugging code uncomment

    //Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql= "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    //Execute the query
    if($con->query($sql)== true){
        // echo "Successfully inserted";

        //Flag for successful insertion
        $insert= true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    //Close the database connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the travel form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,700&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg" src="bg.jpeg" alt="Lonawala">
    <div class="container">
        <h1>Welcome to the Lonawala Trip</h3>
        <p>Enter the details and submit this form to conform your participation
        </p>
        <?php
        if($insert == true){
            echo "<p class='submitMSG'>Thanks for submitting the form. We will happy to see you joining us for trip!</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10"
             placeholder="Enter any description here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>