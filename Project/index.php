<?php
    session_start();
    if(isset($_COOKIE['username'])){
        $uname = $_SESSION['username'] = $_COOKIE['username'];
    }
    else{
        $uname = $_SESSION['username'] = "";//"not set";
    }
    if(!isset($_SESSION['unameErr'])||!isset($_SESSION['passErr'])){
        $_SESSION['unameErr'] = $_SESSION['passErr'] = "";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Hotel Spotter</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <!--<link rel="stylesheet" href="w3_4_point_06.css">-->
        <link rel="stylesheet" href="Aurora_Red_Theme.css">
        <style>
            h1,h2,h3,h4,h5,h6{
                padding:0px;
                margin:0px;
            }
            .divMiddle{
                position:fixed;
                width:40%;
                left:30%;
                top:20%;
                text-align: center;
                box-shadow: 0 14px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
            .intro{
                padding:10px;
            }
            .searchbox{
                padding:10px;
            }
            #id01{
                display: none;
                position:fixed;
                animation:comeFromTop 0.4s;

                z-index: 1;
                left: 20%;
                top: 20%;
                width: 60%;                
            }
            @keyframes comeFromTop{
                from{
                    top:-100px;
                    opacity:0;
                }
                to{
                    top:20%;
                    opacity:1;
                }
            }
            .login-form{
                width:80%;
                padding:10%;
            }
            table{
                width:100%;
            }
            table tr td{
                border: 1px solid black;
            }
            table tr td input{
                width:100%;
            }
        </style>
    </head>
    <body class="w3-theme">
        <div class="divMiddle">
            <div class="intro w3-theme-l1">
                <h3>TravelBD | All Solutions In One Place</h3>
                <button onclick="document.getElementById('id01').style.display='block'">Login</button>
                <a href="reg.php">Sign up</a>
            </div>

            <div class="searchbox w3-theme-d1">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
                    <input type="text" name="searchQuery" placeholder="Search Location">
                    <input type="submit" value="Search">    
                </form>
            </div>
        </div>
        <div id="id01" class="w3-theme-l2">
                <button onclick="document.getElementById('id01').style.display='none'" style="float:right">Cancel</button>
                <form class="login-form" method="post" action="login.php">
                    <table>
                        <tr><td>Username:</td><td> <input type="text"     name="uname" value="<?php echo $uname;?>" required></td></tr>
                        <tr><td colspan=2><div class="error"> <?php echo $_SESSION['unameErr'];?></div></td></tr>
                        <tr><td>Password:</td><td> <input type="password" name="pass" required></td></tr>
                        <tr><td colspan=2><div class="error"> <?php echo $_SESSION['passErr'];?></div></td></tr>
                        <tr><td colspan=2><input id = "submit" type="submit"value="Log In">       </td></tr>
                        <tr><td colspan=2 style="text-align:center"><a href="Reg.php">Create An Account</a></td></tr>
                    </table>
                </form>
        </div>
    </body>
</html>