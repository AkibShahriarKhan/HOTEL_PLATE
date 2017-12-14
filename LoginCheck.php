<!DOCTYPE html>
<?php
session_start();
ob_start();

$_SESSION['loginCheck'] = true;
$_SESSION['hn'] = $_GET['hotelName'];

?>
<html>
    <head>
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
    </head>
    <body><center>
    <h2> Please Log In to Continue </h2>
        <form class = "container" action="LoginPopUp/login.php" method = "post">
            Email: <input type="email" name = "uname"><br><br>
            Password: <input type="password" name="pass"><br><br>
            <input class = "btn" type = "submit" value="Submit">
        </form></center>
    </body>
    </html>
