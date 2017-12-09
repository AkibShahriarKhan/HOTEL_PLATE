<?php
  session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
  <title> Welcome! </title>
  <link rel="stylesheet" href="LoginPopUp/LoginPopUpCSS.css">

  <style>
    #backGroundImage{
      background-image: url('jjgres/photo_1.jpg');
      width:100%;
      background-size:cover;
      position: fixed;
      left:0;
      top:0;
      z-index: -1;
      filter: blur(10px);
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

    .searchBox{
      width:60%;
      margin:2% 20% 0% 20%;
      border-radius: 8px;
      /*border: 1px solid #ff8000;*/
      text-align: center;
      padding:10px;
      box-shadow: 0px 8px 8px -4px rgba(0, 0, 0, 0.2), 0px -8px 8px -4px rgba(0, 0, 0, 0.2);
    }
    .inpText{
      width: 50%;
      margin: 0% 0% 0% 7.5%;
      text-align: center;
      padding: 10px 0px 10px 0px;
    }
    .inpBtn{
      width: 15%;
      background-color: green;
      padding: 12px 0px 12px 0px;
      color: white;
      border: none;
      text-decoration: none;
      text-align: center;
      margin:0% 7.5% 0% 0%;
    }
  </style>
</head>
<body onresize="update()">
  <div id="backGroundImage"></div>

  <header> sala_dia_dhaka <span id="login"></span> </header>

  <div class="searchBox">
        <input class="inpText"type="text" maxlength="200" name="searchQuerry" placeholder="Search Location">
        <input class="inpBtn" type="Submit" value="Search">
  </div>

  <script>
      var divblock = document.getElementById('backGroundImage');
      var he = window.innerHeight;

      function setImageSize(h){
        divblock.style.height=h+"px";
      }
      function update(){
        he = window.innerHeight;
        setImageSize(he);
      }
      function showLoginSignup(x){
          if(x==1){
            document.getElementById('logSign').style.display = "block";
            document.getElementById('logSignOverly').style.display = "block";
          }
          else{
            document.getElementById('logSign').style.display = "none";
            document.getElementById('logSignOverly').style.display = "none";
          }
      }
      setImageSize(he);
  </script>

  <script src="LoginPopUp/LoginPopUpJS.js"></script>
  <script>
    createLoginButton("login");
    addLoginForm();
  </script>

</body>
</html>


<?php
/*
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


    $sql = "SELECT c_email, c_pass FROM client";
    $result = $conn->query($sql);

    $_sql = "SELECT a_email, a_pass FROM agent";
    $_result = $conn->query($_sql);

    if ($result->num_rows > 0) {
      //output data of each row
      while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        if(!empty($row["c_email"]))
          {
            if(trim($row["c_email"]) == $usrName)
            {
              $flag = true;
              if(trim($row["c_pass"]) == $pas)
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
    }
    else {
      echo "0 results";
    }

        if ($_result->num_rows > 0) {
      // output data of each row
      while($_row = $_result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        if(!empty($_row["a_email"]))
          {
            if(trim($_row["a_email"]) == $usrName)
            {
              $flag = true;
              if(trim($_row["a_pass"]) == $pas)
              {
              //echo "Done";
                $_SESSION['usr'] = $usrName;
                echo "<center>Welcome <b>$usrName</b>!<br> Logged in!</center>";
                header("location:agent_home.php");
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
    }


    else {
      echo "0 results";
    }

      }*/
?>
