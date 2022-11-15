<?php

$ReturnID = $_POST['ReturnID'];
$StudentID  = $_POST['StudentID'];
$BookID = $_POST['BookID'];
$Title = $_POST['Title'];
$ReturnDate = $_POST['ReturnDate'];


if (!empty($ReturnID) || !empty($StudentID) || !empty($BookID) || !empty($Title) || !empty($ReturnDate) )
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
  $SELECT = "SELECT rtn_id From return_book Where rtn_id = ? Limit 1";
  $INSERT = "INSERT Into return_book (rtn_id,std_id,book_id,book_title,rtn_date)values(?,?,?,?,?)";

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
      $stmt->bind_param("ssssd", $ReturnID,$StudentID,$BookID,$Title,$ReturnDate);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Already Exist";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>