<?php
session_start();
    //echo "Current Directory:". $_SERVER["PHP_SELF"]."<br>"; 
    $file = fopen("myFile.txt", 'w') or die("File opening error");
    $str = implode("", $_POST);
    fwrite($file, $str);
    $pass = $fname = "";//initializing vars
    $unameErr = $passErr = "";
    
    function purify($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function retrieveNamePassFromDB($uname)
    {
        //Creating Database connection
        $con = new mysqli("localhost", "root", "", "wtproject");
        if ($con->connect_error) 
        {
            die("Connection failed: " . $con->connect_error);
        }

        /*
        if c_email exists in client
            then login as client
        else
            if a_email exists in agent
                then login as agent
            else
                show nameErr
        */
        //Preparing and binding qurery
        $stmt_1 = $con->prepare("SELECT c_pass FROM client WHERE c_email =?");
        $stmt_2 = $con->prepare("SELECT a_pass FROM agent  WHERE a_email =?");

        $stmt_1->bind_param("s", $uname);
        $stmt_2->bind_param("s", $uname);

        //Executing Query
        $stmt_1->execute();
        //Loading Results
        $result = $stmt_1->get_result();

        if($result->num_rows > 0){ //client email exists
            $row = $result->fetch_assoc();
			$_SESSION['tuser'] = "client";
            return $row["c_pass"];
        }
        else{ //client email does not exists
            //Executing Query
            $stmt_2->execute();
            //Loading Results
            $result = $stmt_2->get_result();
            
            if($result->num_rows > 0){ //agent email exists
                $row = $result->fetch_assoc();
				$_SESSION['tuser'] = "agent";
                return $row["a_pass"];
            }
            else{//nosuch email exists
                return null;
            }
        }
    }

//--------------------------------------void main(){-------------------------------------//
    if($_SERVER['REQUEST_METHOD']=='POST')
    {    
        
        //filtering input
        $name = "".purify($_POST['uname']);
        $pass = trim($_POST['pass']);
        
        //Retrieving Credentials From Database
        $passFromFile = retrieveNamePassFromDB($name);

        //echo $pass." ".$passFromFile;
        if($passFromFile != null)
        {
            if($passFromFile == $pass)
            {
                //echo "success";
                if(isset($_SESSION['loginCheck']) && $_SESSION['loginCheck'] == TRUE)
                {
                    $_SESSION['usr']=$name;
                    header("Location: ../room_view.php?hotelName=".$_SESSION['hn']);
                }
                else{
                    if($_SESSION['tuser'] == 'client')
                    {
                        $_SESSION['usr']=$name;
                        echo "1";
                    }
                    else if($_SESSION['tuser'] == 'agent')
                    {
                        $_SESSION['usr']=$name;
                        echo "5";
                    }
                }
            }
            else{
                $passErr = "Wrong Password";
                echo "2";
            }
        }
        else{
            $nameErr = "username not found";
            echo "3";
        }
    }
//--------------------------------------}------------------------------------------------//
?>