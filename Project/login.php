    <?php
        //echo "Current Directory:". $_SERVER["PHP_SELF"]."<br>"; 
        
        $pass = $fname = "";//initializing vars
        $unameErr = $passErr = "";
        
        function inputFiltering($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        function retrieveNamePassFromDB($uname)
        {
            //Creating Database connection
            $con = new mysqli("localhost", "root", "", "test");
            if ($con->connect_error) 
            {
                die("Connection failed: " . $con->connect_error);
            }

            //Preparing and binding qurery
            $stmt = $con->prepare("SELECT PASSWORD, FIRSTNAME from CREDENTIALS where USERNAME = ?");
            $stmt->bind_param("s", $uname);
            //Executing Query
            $stmt->execute();
            //Loading Results
            $result = $stmt->get_result();

            if($result->num_rows > 0){ //name exists
                $row = $result->fetch_assoc();
                $pass = $row["PASSWORD"];
                $fname = $row["FIRSTNAME"];
                $credentials = array("pass"=>$pass, "fname" => $fname);
                //begin debug purpose
                //$file = fopen("debug.txt", 'a') or die("File opening error");
                //fwrite($file, $uname." ".$pass."\n");
                //end debug purpose
                $con->close();
                return $credentials;
            }
            else{ //name does not exists
                $con->close();
                return null;
            }
        }

//--------------------------------------void main(){-------------------------------------//
        if($_SERVER['REQUEST_METHOD']=='POST')
        {    
            
            //filtering input
            $name = "".inputFiltering($_POST['uname']);
            $pass = trim($_POST['pass']);
            
            //Retrieving Credentials From Database
            $passFromFile = retrieveNamePassFromDB($uname);

            //echo $pass." ".$passFromFile;
            if($passFromFile != null)
            {
                if($passFromFile["pass"] == $pass)
                {
                    //echo "success";
                    $_SESSION['username']=$name;
                    $_SESSION['fname'] = $passFromFile["fname"];
                    setcookie("username", $name, time()+86400);//1day=86400 10mins=600
                    header("Location:index.php?status=ok");
                    exit;
                }
                else{$passErr = "Wrong Password";}
            }
            else{$nameErr = "username not found";}
            header("Location:index.php?status=err");
        }
//--------------------------------------}------------------------------------------------//
?>