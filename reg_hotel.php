<?php
    session_start();
    ob_start();
?>


<!DOCTYPE html>

<html>
<head>
  <title> Agent Hotel Registration </title>

  <title>Add or Remove Hotel</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


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
          background-color: #ff1a1a;
          margin-top: 2%;
          margin-left: 2%;

          padding: 20px;
          width: 600px;
          text-align: center;
        }

        .container2{
 						  opacity: 0.8;
 						  border-radius: 4px;
 						  background-color: #F5B7B5;
 						  margin-top: 4%;
 						  margin-left: 17%;
 						  margin-right: -30%;
 						  padding: 20px;
 						  width: 1000px;
 						  text-align: center;
 					}

        body{
          background-image: url(".jpg");
          background-color: white;
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
          margin-top: 30px;
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
        select{
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
        float: left;
            }

      li {
          float: right;
          }

      li a {
          display: block;
          color: white;
          text-align: center;
          padding: 14px 61px;
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




    <li><a style="float: right; margin: 0;" href="lout.php">LOGOUT</a></li>
    <li><a href="abt.php">About us</a></li>
    <li><a href="con.php">Contact</a></li>
    <li><a href="reg.php">Registration</a></li>
    <li><a href="agent.php"><?php if(isset($_SESSION['usr'])){echo $_SESSION['usr']; } ?></a></li>
    <li style="margin-top:00px;"><a class = "active" href="agent_home.php">Home</a></li>
    <li style="margin-top:00px;"><a class = "active" href="index.php">LOG IN</a></li>


  </ul>

    <form class="container" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">




      <label>City:</label>
      <select name = "city">
        <option value=" "> - </option>
        <option value="DHAKA">DHAKA</option>
        <option value="CHITTAGONG">CHITTAGONG</option>
        <option value="KHULNA">KHULNA</option>
        <option value="MYMENSINGH">MYMENSINGH</option>
        <option value="RAJSHAHI">RAJSHAHI</option>
        <option value="RANGPUR">RANGPUR</option>
        <option value="SYLHET">SYLHET</option>

      </select>

      <label>Hotel Name </label>
      <input type="text" name = "name" placeholder="Hotel Name" required/>
      <label>Address: </label>
      <input type="text" name = "address" placeholder="Address" required/>
	     <label>Phone No.</label>
      <input type="text" name = "phone" placeholder="ex: 01710XXXXXX" required/>


      <label>TIN No.</label>
      <input type="text" name = "TIN" placeholder="TIN Number" required/>

	  <label>Sliding Photos:</label>
    <br>


    <table  style="width:80%">
      <tr>
    <td><input type="file" name="fileToUpload1" id="fileToUploa1"></td>
    <td><input type="file" name="fileToUpload2" id="fileToUpload2"></td>
      </tr>
    <tr>
    <td><input type="file" name="fileToUpload3" id="fileToUpload3"></td>
    <td><input type="file" name="fileToUpload4" id="fileToUpload4"></td>
    </tr>
  </table>


      <input class = "btn"  style = "width: 165px; margin-left: 215px" type = "submit" value = "Register">


    </form>














<footer style = "font-family:calibri; letter-spacing:2px; background: orange; text-transform: uppercase;"> Copyright &copy 2018 </footer>
</body>

</html>

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

     if($_SERVER['REQUEST_METHOD']=='POST')
     {
      $city = purify($_POST['city']);
      $name = purify($_POST['name']);
      $address = purify($_POST['address']);
      $phone = purify($_POST['phone']);
      $TIN = purify($_POST['TIN']);
      $photo1 = purify($_POST['fileToUpload1']);
      $photo2 = purify($_POST['fileToUpload2']);
      $photo3 = purify($_POST['fileToUpload3']);
      $photo4 = purify($_POST['fileToUpload4']);

     }



 $sql = "INSERT INTO hotel_info (d_name,h_name,h_address, h_phone, h_TIN, h_photo1)
 VALUES ('$city','$name', '$address', '$phone', '$TIN', '$photo1')";


 if ($conn->query($sql) === TRUE) {

   $_SESSION['hotel'] = $name;
   header("location:reg_room.php");
   echo "<script type='text/javascript'>alert('Successfully Register!')</script>";


 } else {
   echo "Error: " . $sql . "<br>" . $conn->error;
 }

 $conn->close();

}
//header("location:reg_room.php");
   ?>
