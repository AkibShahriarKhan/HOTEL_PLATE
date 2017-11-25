<?php

  session_start();

  $usrName = $_SESSION['usr'];

  $update = false;

  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $id = $_POST['id'];
    $q = $_POST['Quan'];
    $pr = $_POST['price'];

    if(isset($_SESSION['arr']))
    {
      $ar = $_SESSION['arr'];

      if(array_key_exists($id, $ar))
      {
        $ar[$id][0] += $q;
        $ar[$id][1] = $pr;

        print_r($ar);

        $_SESSION['arr'] = $ar;
      }
      else{
        $ar[$id][0] = $q;
        $ar[$id][1] = $pr;

        print_r($ar);

        $_SESSION['arr'] = $ar;
      }
    }
    else{
      $ar = array($id => array($q, $pr));

      print_r($ar);

      $_SESSION['arr'] = $ar;
    }
    $update = true;
  }

  if($update)
  {
    echo "<meta http-equiv='refresh' content='0'>";
    $update = false;
  }

  header("Location: home.php");
 ?>
