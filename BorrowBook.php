<?php

$BorrowID = $_POST['BorrowID'];
$StudentID  = $_POST['StudentID'];
$BookID = $_POST['BookID'];
$Title = $_POST['Title'];
//$BorrowDate = date('Y-m-d', strtotime(($_POST['BorrowDate'])));


if (!empty($BorrowID) || !empty($StudentID) || !empty($BookID) || !empty($Title) || !empty($BorrowDate) )
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
  $SELECT = "SELECT brw_id From borrow_book Where brw_id = ? Limit 1";
  $INSERT = "INSERT Into borrow_book (brw_id,std_id,book_id,book_title,brw_date)values(?,?,?,?,now())";

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
      $stmt->bind_param("ssss", $BorrowID,$StudentID,$BookID,$Title);
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