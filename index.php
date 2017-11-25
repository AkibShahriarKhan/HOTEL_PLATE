<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
  <title> Welcome! </title>

  <style>
    .btn{
      background-color: green;
      padding: 15px 32px;
      color: white;
      border: none;
      text-decoration: none;
      text-align: center;
      width: 165px;
    }

    .btn:hover{
      background-color: #00cc00;
    }

    input[type = text], select{
      border-radius: 0px;
      border: 1px solid #ff8000;
      text-align: center;
      padding: 10px;
      margin-top: 40px;
      margin-bottom: 40px;
    }

    input[type = password], select{
      border-radius: 0px;
      border: 1px solid #ff8000;
      text-align: center;
      padding: 10px;
      margin-top: 40px;
    }

    .a1{
      text-decoration: none;
      color: black;
    }
    a:hover{
      background-color: orange;
    }

    ul {
      font-family: calibri;
      letter-spacing: 2px;
      text-align: center;
      list-style-type: none;
      margin-top: 180px;
      padding: 0;
      width: 12%;
      background-color: #ffcc99;
      position: fixed;
      height: 47%;
      border-radius: 4px 4px;
      overflow: auto;
    }

    li a{
      display: block;
      color: black;
      background-color:  #ffcc99;
      padding: 10px 16px;
      text-decoration: none;
      text-transform: uppercase;
    }

    li a.active{
      background-color: green;
      color: white;
    }

    li a.active:hover{
      background-color: #00cc00;
    }

    li a:hover:not(.active){
      background-color: #cc7a00;
    }

    div {
      opacity: 0.8;
      border-radius: 4px;
      background-color: #ffcc99;
      margin-top: 3%;
      margin-left: 60%;
      margin-right: 1%;
      padding: 20px;

    }

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
      background-color:#2ECC71;
    }

    body {
      background-image: url("img/20.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    label {
      letter-spacing: 2px;
      text-transform: uppercase;
      border: 2px solid;
      padding: 10px;
      border-color: #cc7a00;
      font-family: calibri;
      font-weight: lighter;
      color: black;
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

<div>
<center><form action="index.php" method = "post">

  <input type = "text" name = "usr" placeholder="User Name" required/>
  <input type="password" name="pass" placeholder="Password" required/><br><br>
  <input class = "btn" type = "submit" name = "login" value = "LOGIN"/>
</form></center>

<br><center><a href = "reg.php"> Create New Account </a></center>
</div>

<footer style = "font-family:calibri; letter-spacing:2px; background: orange; text-transform: uppercase;"> Copyright &copy 2018 </footer>
</body>
</html>


<?php





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



    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      function purify($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
      }

      $usrName = purify($_POST['usr']);
      $pas = purify($_POST['pass']);


	$sql = "SELECT user, pass FROM reg";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
			if(!empty($row["user"]))
    		{
    			if(trim($row["user"]) == $usrName)
    			{
    				$flag = true;
    				if(trim($row["pass"]) == $pas)
    				{
              $_SESSION['usr'] = $usrName;
    					echo "<center>Welcome <b>$usrName</b>!<br> Logged in!</center>";
              header("location:home.php");
    					break;

    				}
    				else
    				{
    					echo "<center>Password doesn't match!<br><center>";
    					break;
    				}
    			}
    		}

		}
	} else {
		echo "0 results";
	}



    }

 ?>
