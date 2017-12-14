<?php
    session_start();
    //$location=$_SESSION['loc'];
    $_GET['searchQuerry'] = (isset($_GET['searchQuerry']))?$_GET['searchQuerry']:"%";
    $isLoggedIn = isset($_SESSION['usr'])?"true":"false";
?>
<!DOCTYPE html>
<html>

<head>
  <title> Home </title>
  
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
      background-color:#2ECC71;}

    
    
    .container{
      opacity: 0.8;
      border-radius: 4px;
      background-color: #ffcc99;
      margin-top: 2%;
      margin-left: 33%;
      margin-right: 35%;
      padding: 20px;
      width: 600px;
      text-align: center;
      float: right;    }

    body{
      background-image: url(".jpg");
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;   }

    h1{
      font-family: Calibri;
      font-weight: lighter;
      text-transform: uppercase;    }

    label{
      margin-top: 10px;
      margin-bottom: 10px;
      display: inline-block;
      float: left;
      clear: left;
      width: 200px;
      text-align: left;
      font-family: calibri;
      font-weight: lighter;
      text-transform: uppercase;    }

    .btn{
      background-color: red;
      padding: 15px 32px;
      color: white;
      border: none;
      text-decoration: none;
      text-transform: uppercase;
      font-weight: 500;
      text-align: center;
      margin-left: 33%;
      margin-top: 50px;    }

    .btn:hover{
      background-color: #00cc00;    }

    form{
      float:left;    }

    a{
      text-decoration: none;
      color: black;    }

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
      background-color:#D6EAF8;    }

    footer{
      text-align: center;
      position: fixed;
      left: 45%;
      bottom: 0%;    }

    .tableC{
      opacity: 0.8;
      display: inline-block;
      float: left;
      text-align: center;
      margin-top: 2%;
      margin-left: 2%;
      margin-right: 2%;
      padding: 1% 1% 1% 1%;
      background-color:#D6EAF8;
      text-transform: uppercase;
      font-family: calibri;
      font-weight: lighter;    }

    .tableC2{
      position: fixed;
      opacity: 0.8;
      margin-top: 7.8%;
      margin-left: 8.5%;
      padding: 2% 2% 2% 2%;
      background-color:#D6EAF8;
      display: inline-block;
      width: 25%;    }

    label{
      text-transform: uppercase;
      font-family: calibri;
      font-weight: lighter;    }
      
    .searchBox{
      width:60%;
      margin:2% 20% 0% 20%;
      border-radius: 8px;
      /*border: 1px solid #ff8000;*/
      text-align: center;
      padding:10px;
      box-shadow: 0px 8px 8px -4px rgba(0, 0, 0, 0.2), 0px -8px 8px -4px rgba(0, 0, 0, 0.2);
    }
    #inpText{
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
  <link rel="stylesheet" href="LoginPopUp/LoginPopUpCSS.css">
  <script src="LoginPopUp/LoginPopUpJS.js"></script>
  <script src="dynamicSearch/dynamicSearch.js"></script>

</head>

<body>

  <header> sala_dia_dhaka <span id="login"></header>
  <script>
    var isLoggedIn="<?php echo $isLoggedIn; ?>";
    loginLogoutToggler(isLoggedIn, "login");
  </script>
  <ul>




    
    <li><a href="abt.php">About us</a></li>
    <li><a href="con.php">Contact</a></li>
    <li><a href="reg.php">Registration</a></li>
    <li><a href="client.php"><?php if(isset($_SESSION['usr'])){echo $_SESSION['usr']; } ?></a></li>
    <li style="margin-top:00px;"><a class = "active" href="home.php">Home</a></li>
  </ul>
  <?php //echo "<wl>Welcome, ".$_SESSION['usr']."</wl>"; ?>

  <form style = "position: fixed; margin-left: 85%;" action  = "chk.php" method = "post">
    <input type="hidden" name = "chk" value = "1">
    <input class = "btn" type = "submit" name = "ch" value = "Checkout">
  </form>

<div class="searchBox" style="background-color:orange; height:100px;">
    <form method = "GET" action = "home.php">
      <input id="inpText" type="text" list="locationList" maxlength="200" name="searchQuerry" placeholder="Search Location">
      <input class="inpBtn" type="Submit" value="Search"><br>
    </form>
    <datalist id="locationList">
    </datalist>
    <script>DSeacrhAjaxCall();</script>
</div>


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
    $stmt = $conn->prepare("SELECT h_name, h_address, h_phone, h_TIN, a_email, h_photo1 FROM hotel_info where d_name = ?");
    $stmt->bind_param("s", $_GET['searchQuerry']);

    //Executing Query
    $stmt->execute();
    //Loading Results
    $result = $stmt->get_result();

    if(!isset($_SESSION['usr']))
    {
      $loc = "LoginCheck.php?hotelName=";
    }
    else
    {
      $loc = "room_view.php?hotelName=";
    }
    if ($result->num_rows > 0) {
      if(!isset($_GET['edit']) || $_GET['edit'] == 'false'){
  	    while($row = $result->fetch_assoc()) {
          $image_data = $row["h_photo1"];
          $image_name = $row["h_name"];
          $encoded_image = base64_encode($image_data);
          //You dont need to decode it again.

          $Hinh = "<img src='data:image/jpeg;base64,{$encoded_image}' alt=\"$image_name\" width='300' height='200'>";
          echo "<table class='container' width:10%>";
  		    echo "<tr><td>"."NAME:"."</td><td>".$row["h_name"]."</td><tr><td>"."ADDRESS:"."</td><td>".$row["h_address"]."</td><tr><td> "."PHONE"."</td><td>".$row["h_phone"]."</td><tr><td>"."TIN Number:"."</td><td>".$row["h_TIN"]."</td><tr><td>"."AGENT:"."</td><td>".$row["a_email"]."</td><tr><td>"."</td><tr><td>"."PHOTO:"."</td><td>"."$Hinh</img>"."</td></tr>";
          echo " <tr><td><a href='".$loc.$row['h_name']."'>Room View</a></td></tr></table>";
        }

    }


    else if($_GET['edit'] == 'true'){
  	  while($row = $result->fetch_assoc()) {
        echo "<tr><td>"."NAME:"."</td><td>".$row["c_name"]."</td><tr><td>"."EMAIL:"."</td><td>".$row["c_email"]."</td><tr><td> "."Password"."</td><td>".$row["c_pass"]." <a class = 'aCust' style = 'font-size:8' href='client.php?edit=true'>Update</a></td><tr><td>"."GENDER:"."</td><td>".$row["c_gender"]."</td><tr><td>"."OCCUPATION:"."</td><td>".$row["c_occupation"]."</td><tr><td>"."PHONE NO."."</td><td>".$row["c_phone"]."</td><tr><td>"."PHOTO:"."</td><td>".$row["c_name"]."</td></tr>";
      }
      echo "</table>";

  	  $_GET['edit'] == 'false';
    }


    }

    else {
      echo "0 results";
    }
  //}
  ?>
    <?php
      if(isset($_SESSION['arr']) && !empty($_SESSION['arr']))
      {
        $temp = 0;
        $arr1 = $_SESSION['arr'];
        foreach($arr1 as $x => $x_val)
        {
          echo "<tr style = 'text-align:center'><td style = 'border: 1px solid grey; width: 100px;'><center>".$x."</center></td>";
          echo "<td style = 'border: 1px solid grey; width: 100px;'>".$x_val[0]."</td>";
          echo "<td style = 'border: 1px solid grey; width: 100px;'>".$x_val[0]*$x_val[1]."<form style = 'display: block;' action= 'rem.php' method='post'> <input type='hidden' name = 'r' value = '".$x."'> <input style='margin-left:150px; margin-top:-200px;' type = 'submit' value = 'remove'></td></tr>";
          $temp += $x_val[0]*$x_val[1];
        }
        if(!empty($_SESSION['arr']))
        {
          echo "<tr style = 'text-align:center'><td>Total</td> <td> </td> <td>".$temp."</td></tr>";
          $_SESSION['total'] = $temp;
        }
      }
    ?>
  </table><br>

<footer style = "font-family:calibri; letter-spacing:2px; background: orange; text-transform: uppercase;"> Copyright &copy 2018 </footer>
</body>

</html>
