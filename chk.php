<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saladia";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Checkout</title>
  <style>
  header{
    padding: 20px;
    text-align: center;
    background-color: orange;
    color: black;
    text-transform: uppercase;
    letter-spacing: 8px;
    font-family: impact;
    font-weight: lighter;
    font-size: 32px;
    background-color:#2ECC71;  }

  a{
    text-decoration: none;
    color: black;  }

  ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;}

  li {
    float: right;}

  li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;}

  li a:hover {
    background-color: #111;}

  li a:hover:not(.active){
    background-color:#D6EAF8;  }


  .tableC2{
    position: fixed;
    opacity: 0.8;
    margin-top: 7.8%;
    margin-left: 8.5%;
    padding: 2% 2% 2% 2%;
    background-color:#D6EAF8;
    display: inline-block;
    width: 25%;
  }

  </style>
</head>

<body>
    <header> sala_dia_dhaka </header>
    <ul>




      <li><a style="float: right; margin: 0;" href="lout.php">LOGOUT</a></li>
      <li><a href="abt.php">About us</a></li>
      <li><a href="con.php">Contact</a></li>
      <li><a href="reg.php">Registration</a></li>
      <li><a href="home.php"><?php echo $_SESSION['usr']; ?></a></li>
      <li style="margin-top:00px;"><a class = "active" href="home.php">Home</a></li>
    </ul>
    <table class = "tableC2">
      <tr>
        <th>ROOM</th>
        <th>BOOKED.....</th>
        <th>BILL:<?php echo $_SESSION['total']; ?></th>
      </tr>
</body>
<?php

    //session_start();
$usrName = $_SESSION['usr'];
    if(empty($_SESSION['arr'])){
      header("location:home.php");
      exit;
    }



    $ar = $_SESSION['arr'];

    //echo "<center><p>Room Booked. Total Bill: ".$_SESSION['total']."</p><br></center>";

    $dat = "";
    $counter = 0;












    $d=date("Y-m-d h:i:sa");

    foreach($ar as $x=> $x_val)
    {

      $sql = "INSERT INTO orderList (user, product, quantity, cost, time)
      VALUES ('$usrName', '$x', '$x_val[0]', '$x_val[1]', '$d'  )";

    }

    $ar = null;

    $_SESSION['arr'] = $ar;


    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

 ?>

</html>
