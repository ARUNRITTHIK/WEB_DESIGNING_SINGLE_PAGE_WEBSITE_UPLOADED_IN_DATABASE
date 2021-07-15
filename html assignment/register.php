<?php

$NAME1 = $_POST['NAME1'];
$EMAIL  = $_POST['EMAIL'];
$PASSWORD1 = $_POST['PASSWORD1'];
$PASSWORD2 = $_POST['PASSWORD2'];




if (!empty($NAME1) || !empty($EMAIL) || !empty($PASSWORD1) || !empty($PASSWORD2) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "register1";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From Registration  Where email = ? Limit 1";
  $INSERT = "INSERT Into Registration (NAME1 , EMAIL ,PASSWORD1, PASSWORD2 )values(?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $EMAIL);
     $stmt->execute();
     $stmt->bind_result($EMAIL);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $NAME1,$EMAIL,$PASSWORD1,$PASSWORD2);
      $stmt->execute();
      echo "New record inserted sucessfully";
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