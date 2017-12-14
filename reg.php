<!DOCTYPE html>
<?php
ob_start();
?>
<html>
<head>
  <title> Registration </title>

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
    <li style="margin-top:00px;"><a class = "active" href="index.php">LOG IN</a></li>


  </ul>

    <form class="container" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
      <label>First Name </label>
      <input type="text" name = "fn" placeholder="Your Name" required/>
      <label>Email </label>
      <input type="email" name = "mail" placeholder="ex: someone@domain.com" required/>
    <!--  <label>phone </label>
      <input type="text" name = "m" placeholder="ex: 01710XXXXXX" required/>
      <label>National ID </label>
      <input type = "text" name = "nid" placeholder="NID" required/>
      <label>user name</label>
      <input type="text" name = "u" placeholder="User Name" required/>-->
      <label>password</label>
      <input type="password" name = "p" placeholder="Password" required/>
      <input class = "btn" style = "width: 165px; margin-left: 215px" type = "submit" value = "Register">
	  <a href="agent_reg.php">Register as An Agent?</a>

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

          $fname = purify($_POST['fn']);
          $email = purify($_POST['mail']);
          //$mobile = purify($_POST['m']);
          //$usr = purify($_POST['u']);
          $pass = purify($_POST['p']);
          //$id = purify($_POST['nid']);



		  $sql = "INSERT INTO client (c_name,c_email,c_pass)
			VALUES ('$fname', '$email', '$pass'  )";


		  if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: index.php");
        exit;
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
