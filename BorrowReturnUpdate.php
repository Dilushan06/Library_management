<?php
	//connect with mysql
	$con = mysqli_connect('localhost','root','');
	// select database
	mysqli_select_db($con, 'library_database');
	//SELECT QUERY
    $sql = "INSERT INTO return_book(rtn_id,std_id,book_id,book_title,rtn_date)
     Values('$_POST[BorrowID]','$_POST[StudentID]','$_POST[BookID]','$_POST[BookTitle]',now())";
    //Execute the query
    if(mysqli_query($con,$sql))
    	header("refresh:1; url=BorrowBookReturn.php");
    else
    	echo "Not Updated";

?>