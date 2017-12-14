<!DOCTYPE html>

<?php session_start();

ob_start();

?>

<html>
<head>
  <title> Agent Registration </title>

  <style>
        header
        {
          padding: 20px;
          text-align: center;
          background-color: orange;
          color: black;
          text-transform: uppercase;
          letter-spacing: 8px;
          font-family: impact;
          font-weight: lighter;
          font-size: 32px;
          background-color:#2ECC71;
        }

        div {
          opacity: 0.8;
          border-radius: 4px;
          background-color: #ffcc99;
          margin-top: 2%;
          margin-left: 33%;
          margin-right: 35%;
          padding: 20px;
          width: 600px;
          text-indent: 230px;
        }

        .container{
          opacity: 0.8;
          border-radius: 4px;
          background-color: #F5B7B1;
          margin-top: 4%;
          margin-left: 52.5%;
          margin-right: -30%;
          padding: 20px;
          width: 600px;
          text-align: center;
        }

        body{
          background-image: url("img/30.jpg");
          background-size: cover;
          background-repeat: no-repeat;
          background-attachment: fixed;
        }

        h1{
          font-family: impact;
          font-weight: lighter;
          text-transform: uppercase;
        }

        label{
          margin-top: 10px;
          margin-bottom: 10px;
          display: inline-block;
          float: left;
          clear: left;
          width: 250px;
          text-align: center;
          font-family: calibri;
          font-weight: lighter;
          text-transform: uppercase;
        }

        .btn{
          background-color: green;
          padding: 15px 32px;
          color: white;
          border: none;
          text-decoration: none;
          text-transform: uppercase;
          font-weight: 500;
          text-align: center;
          margin-left: 25%;
          margin-top: 50px;
        }

        .btn:hover{
          background-color: #00cc00;
        }

        input {
          border-radius: 0px;
          border: none;
          text-align: center;
          padding: 5px;
          margin-top: 10px;
          margin-left: -10px;
          margin-bottom: 10px;
          width: 300px;
          display: inline-block;
          float: left;
        }

        form{
          float:left;
        }

        a{
          text-decoration: none;
          color: black;
        }

        ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
        float: right;
            }

      li {
          float: left;
          }

      li a {
          display: block;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
            }

      li a:hover {
          background-color: #111;
            }

          li a:hover:not(.active){
            background-color:#D6EAF8;
              }
          footer{
            text-align: center;
            position: fixed;
            left: 45%;
            bottom: 0%;
              }

        </style>

</head>

<body>

  <header> sala_dia_dhaka </header>
  <ul>
    <li style="margin-top:00px;"><a class = "active" href="lout.php">LOG OUT</a></li>

 <?php
 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "wtproject";
  
  $u = $_SESSION['usr'];

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }


  $sql = "SELECT a_name,a_email, a_pass, a_gender, a_phone, a_age, a_position, a_photo FROM agent WHERE a_email='$u'";
  
  $result = $conn->query($sql);
  
  if($result->num_rows > 0)
  {
	  while($row = $result->fetch_assoc())
	  {
		  $u = $row['a_name'];
		  $em = $row['a_email'];
		  $p = $row['a_pass'];
		  $ph = $row['a_phone'];
		  $age = $row['a_age'];
		  $pos = $row['a_position'];
	  } 
  
  echo "</ul>";

    echo"<form class='container' action = ".htmlspecialchars($_SERVER['PHP_SELF'])." method = 'post'>";
      echo "<label>Name </label>";
      echo "<input type='text' name = 'name' value='$u' required/>";
      echo "<label>Email </label>";
      echo "<input type='email' name = 'mail' value='$em' disabled/>";
	  echo "<label>password</label>";
      echo "<input type='text' name = 'pass' value='$p' required/>";

	  /*<!--
      <label for="gender">Gender</label>
	  <input type="radio" name="gender" value="male" checked="checked">Male
	  <input type="radio" name="gender" value="female">Female
	  -->*/

	  echo "<label>Phone </label>";
      echo "<input type='text' name = 'phone' value='$ph' required/>";
      echo "<label>Age</label>";
      echo "<input type='text' name = 'age' value='$age' required/>";
	  echo "<label>Position</label>";
      echo "<input type='text' name = 'position' value='$pos' required/>";
	  
	  echo "<label>Photo</label>";
	  echo "<input type='file' name='fileToUpload' id='fileToUpload'>";

      echo "<input class = 'btn' style = 'width: 165px; margin-left: 215px' type = 'submit' value = 'Update'>";
	  
  }
	  
	  ?>

	   <?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "wtproject";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

          function purify($data)
          {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
          }

          $name = purify($_POST['name']);
          $email = purify($_POST['mail']);
          $phone = purify($_POST['phone']);
          $pass = purify($_POST['pass']);
          $age = purify($_POST['age']);
          $position = purify($_POST['position']);

		      $photo = purify($_POST['fileToUpload']);



		  $sql = "UPDATE agent SET a_name = '$name', a_pass = '$pass', a_phone = '$phone', a_age= '$age', a_position = '$position' where a_email = '".$_SESSION['usr']."'";


		  if ($conn->query($sql) === TRUE) {

				echo "<script type='text/javascript'>alert('Successfully Edited!')</script>";
				$conn->close();
				header("Location: agent.php");
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();

		}

        ?>
    </form>

<footer style = "font-family:calibri; letter-spacing:2px; background: orange; text-transform: uppercase;"> Copyright &copy 2018 </footer>
</body>

</html>
