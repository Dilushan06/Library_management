<?php
	//connect with mysql
	$con = mysqli_connect('localhost','root','');
	// select database
	mysqli_select_db($con, 'library_database');
	//SELECT QUERY
    $sql = "UPDATE return_book SET rtn_id='$_POST[ReturnID]',std_id='$_POST[StudentID]',
	book_id='$_POST[BookID]',book_title='$_POST[BookTitle]',rtn_date='$_POST[ReturnDate]'
    WHERE rtn_id='$_POST[ReturnID]'";
    //Execute the query
    if(mysqli_query($con,$sql))
    	header("refresh:1; url=ReturnBookIndex.php");
    else
    	echo "Not Updated";

?>