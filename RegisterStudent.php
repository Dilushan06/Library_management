<?php

$StudentID = $_POST['StudentID'];
$StudentName  = $_POST['StudentName'];
$FacultyID = $_POST['FacultyID'];
$Gender = $_POST['Gender'];
$ContactNumber = $_POST['ContactNumber'];


if (!empty($StudentID) || !empty($StudentName) || !empty($FacultyID) || !empty($Gender) || !empty($ContactNumber) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "library_database";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT std_id From student Where std_id = ? Limit 1";
  $INSERT = "INSERT Into student (std_id,std_name,fac_id,gender,cont_num)values(?,?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $StudentID);
     $stmt->execute();
     $stmt->bind_result($StudentID);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssss", $StudentID,$StudentName,$FacultyID,$Gender,$ContactNumber);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this StudentID";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>