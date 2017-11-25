<?php
    session_start();
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

    div {
      opacity: 0.8;
      border-radius: 4px;
      background-color: #ffcc99;
      margin-top: 1%;
      margin-left: 30%;
      margin-right: 35%;
      padding: 20px;
      width: 400px; }

    wl{

        opacity: 0.8;
        border-radius: 4px;
        background-color: #ffcc99;
        margin-top: 1%;
        margin-left: 30%;
        margin-right: 35%;
        padding: 20px;
        width: 400px;
        float: right;    }

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
      background-image: url("img/2.jpg");
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
  <?php //echo "<wl>Welcome, ".$_SESSION['usr']."</wl>"; ?>






  <form style = "position: fixed; margin-left: 85%;" action  = "chk.php" method = "post">
    <input type="hidden" name = "chk" value = "1">
    <input class = "btn" type = "submit" name = "ch" value = "Checkout">
  </form>

  <table class = "tableC" style = "margin-left:1PX;">
    <tr>
      <th> HOTEL 1 </th>
      <th> HOTEL 2 </th>
      <th> HOTEL 3 </th>
    </tr>
    <tr>

      <td style = "border: 2px solid grey;" >


        <form action = "add.php" method="post">

          <label>Room ID:</label><br>

          <input style = "float: left;border: 0px; width:40px; background-color: #D6EAF8; color: black; margin-top: -10px; margin-left: -120px" type = "text" name = "id" value = "R1" readonly><img src="img/r1.jpg" style="width:200px; height:auto; alt="h1">
          <label>Price($): </label><br>

          <input style = "float: left;border: 0px; width:40px; background-color: #D6EAF8; color: black; margin-top: 10px; margin-left: -120px" type = "text" name = "price" value = "200" readonly>
          <label>Room Quantity: </label>
          <input style = "width:40px; margin-top: 50px; margin-left: -120px;" type = "text" name = "Quan">
          <input type = "submit" value = "Book">

        </form>
      </td>


      <td style = "border: 2px solid grey;">

        <form action = "add.php?>" method="post">
          <label>Room ID:</label><br>
          <input style = "float: left;border: 0px; width:40px; background-color: #D6EAF8; color: black; margin-top: -10px; margin-left: -120px" type = "text" name = "id" value = "R2" readonly><img src="img/r2.jpg" style="width:200px; height:auto; alt="h2">
          <label>Price($):</label><br>
          <input style = "float: left;border: 0px; width:40px; background-color: #D6EAF8; color: black; margin-top: 10px; margin-left: -120px" type = "text" name = "price" value = "200" readonly>
          <label>Room Quantity:</label>
          <input style = "width:40px; margin-top: 50px; margin-left: -120px;" type = "text" name = "Quan">
          <input type = "submit" value = "Book">
        </form>
      </td>


      <td style = "border: 2px solid grey;">

        <form action = "add.php?>" method="post">
          <label>Room ID:</label><br>
          <input style = "float: left;border: 0px; width:40px; background-color: #D6EAF8; color: black; margin-top: -10px; margin-left: -120px" type = "text" name = "id" value = "R3" readonly><img src="img/r3.jpg" style="width:200px; height:auto; alt="h3">
          <label>Price($):</label><br>
          <input style = "float: left;border: 0px; width:40px; background-color: #D6EAF8; color: black; margin-top: 10px; margin-left: -120px" type = "text" name = "price" value = "200" readonly>
          <label>Room Quantity:</label>
          <input style = "width:40px; margin-top: 50px; margin-left: -120px;" type = "text" name = "Quan">
          <input type = "submit" value = "Book">
        </form>
      </td>

  </table>

  <table class = "tableC2">
    <tr>
      <th>ROOM</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>
    <?php
      if(isset($_SESSION['arr']) && !empty($_SESSION['arr']))
      {
        $temp = 0;
        $arr1 = $_SESSION['arr'];
        foreach($arr1 as $x => $x_val)
        {
          echo "<tr style = 'text-align:center'><td style = 'border: 1px solid grey; width: 100px;'><center>".$x."</center></td>";
          echo "<td style = 'border: 1px solid grey; width: 100px;'>".$x_val[0]."</td>";
          echo "<td style = 'border: 1px solid grey; width: 100px;'>".$x_val[0]*$x_val[1]."<form style = 'display: inline-block; float:right;' action= 'rem.php' method='post'> <input type='hidden' name = 'r' value = '".$x."'> <input style='margin-left:150px; margin-top:-200px;' type = 'submit' value = 'remove'></td></tr>";
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
