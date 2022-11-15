<?php
	//Connect with MYSQL
    $con = mysqli_connect ('localhost', 'root','');
    //Select Database
    mysqli_select_db ($con, 'library_database');
    //SELECT QUERY
    $sql = "DELETE FROM book WHERE book_id='$_GET[book_id]'";
    //Execute the query
    if(mysqli_query ($con, $sql))
    	header("refresh:1; url=BookIndex.php");
    else
    	echo "Deletion Failed";

?>