<?php
	//connect with mysql
	$con = mysqli_connect('localhost','root','');
	// select database
	mysqli_select_db($con, 'library_database');
	//SELECT QUERY
    $sql = "UPDATE borrow_book SET brw_id='$_POST[BorrowID]',std_id='$_POST[StudentID]',
	book_id='$_POST[BookID]',book_title='$_POST[BookTitle]',brw_date='$_POST[BorrowDate]'
    WHERE brw_id='$_POST[BorrowID]'";
    //Execute the query
    if(mysqli_query($con,$sql))
    	header("refresh:1; url=BorrowBookIndex.php");
    else
    	echo "Not Updated";

?>