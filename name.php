<?php
session_start();
 $connect = mysqli_connect("localhost", "root", "", "wtproject");

	if ($_POST["ac"]=='Yes'){
		$ac = "Yes";
	}
	else {
		$ac = "No";
	}

	if($_POST["roomtype"]=='SINGLE'){

		$rType="SINGLE";



	}
	else if($_POST["roomtype"]=='DOUBLE'){

		$rType="DOUBLE";



	}
	else if($_POST["roomtype"]=='FAMILY'){

		$rType="DOUBLE";



	}
	else if($_POST["roomtype"]=='MULTIPORPOSES'){

		$rType="MULTIPORPOSES";



	}

 $number = count($_POST["name"]);
 if($number > 0)
 {
      for($i=0; $i<$number; $i++)
      {
           if(trim($_POST["name"][$i] != ''))
           {
             $sql = "INSERT INTO hotel_room(h_name,r_type,r_no, ac, r_cost, r_pic) VALUES('".mysqli_real_escape_string($connect, $_SESSION['hotel'])."','".mysqli_real_escape_string($connect, $rType)."','".mysqli_real_escape_string($connect, $_POST["name"][$i])."', '".mysqli_real_escape_string($connect, $ac)."', '".mysqli_real_escape_string($connect, $_POST["cost"][$i])."', '".mysqli_real_escape_string($connect, $_POST["fileToUpload"][$i])."')";
              mysqli_query($connect, $sql);
           }
      }
      echo "Data Inserted";
 }
 else
 {
      echo "Please Enter Name";
 }
 ?>
