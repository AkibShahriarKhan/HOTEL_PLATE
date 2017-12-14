<?php
  session_start(); 
  $isLoggedIn = isset($_SESSION['usr'])?"true":"false";
 ?>
<!DOCTYPE html>
<html>
<head>
  <title> Welcome! </title>
  <link rel="stylesheet" href="LoginPopUp/LoginPopUpCSS.css">
  <script src="LoginPopUp/LoginPopUpJS.js"></script>
  <script src="dynamicSearch/dynamicSearch.js"></script>
  
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
<body onresize="update()">
  <div id="backGroundImage"></div>

  <header> sala_dia_dhaka <span id="login"></span> </header>
  

  <div class="searchBox">
    <form method = "GET" action = "home.php">
      <input id="inpText" type="text" list="locationList" maxlength="200" name="searchQuerry" placeholder="Search Location">
      <input class="inpBtn" type="Submit" value="Search"><br>
    </form>
    <datalist id="locationList">
    </datalist>
    <script>DSeacrhAjaxCall();</script>
    
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
    var isLoggedIn="<?php echo $isLoggedIn; ?>";
    loginLogoutToggler(isLoggedIn, "login");
  </script>

</body>
</html>
