<?php
$insert = false;
if(isset($_POST['fname'])){
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("connection to this databse failed due to " . mysqli_connect_error());
}
// echo "suucess connecting to the db"

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$address = $_POST['address'];


$sql ="INSERT INTO `employe`.`emp` ( `fname`, `lname`, `email`, `address`, `Date`) VALUES ( '$fname', '$lname', '$email', '$address', current_timestamp());";



if($con->query($sql) == true){
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <form action="index.php" method="post">
        <div class="heading"><span><h2>Job application </h2> <h4>(Web)</h4></span> </div>
        <?php
        if($insert == true){
        echo "<p>Thanks for submitting your form</p>";}
        ?>
      
        
        <div class="fname">
            <div><label for="fname">First name:</label></div>
        <input type="text" name="fname" class="area" placeholder="First name"></div>

        <div class="lname"> <div><label for="lname">Last name:</label></div>
        <input type="text" name="lname" class="area" placeholder="Last name"></div>

        <div class="email"><div><label for="email">Email:</label></div>
        <input type="email" class="area" name="email" placeholder="Email"></div>

        <div class="address"><div><label for="address">Address</label></div>
        <textarea name="address" id="address" cols="60" rows="8"></textarea></div>


        <div class="btn" ><button type="submit">Apply now</button></div>
    </form>
</div>
     

    
</body>
</html>