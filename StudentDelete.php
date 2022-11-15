<?php
	//Connect with MYSQL
    $con = mysqli_connect ('localhost', 'root','');
    //Select Database
    mysqli_select_db ($con, 'library_database');
    //SELECT QUERY
    $sql = "DELETE FROM student WHERE Std_id='$_GET[std_id]'";
    //Execute the query
    if(mysqli_query ($con, $sql))
    	header("refresh:1; url=StudentIndex.php");
    else
    	echo "Deletion Failed";

?>