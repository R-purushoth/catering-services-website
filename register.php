<?php

$regUsername = $_POST['regUsername'];
$regEmail  = $_POST['regEmail'];
$regPassword = $_POST['regPassword'];
$regPassword2 = $_POST['regPassword2'];




if (!empty($regUsername) || !empty($regEmail) || !empty($regPassword) || !empty($regPassword2) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "smatercater";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT regEmail From register Where regEmail = ? Limit 1";
  $INSERT = "INSERT Into register (regUsername , regEmail ,regPassword, regPassword2 )values(?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $regEmail);
     $stmt->execute();
     $stmt->bind_result($regEmail);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $regUsername,$regEmail,$regPassword,$regPassword2);
      $stmt->execute();
      header('location:index.html');
    
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>