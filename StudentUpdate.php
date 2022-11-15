<?php
	//connect with mysql
	$con = mysqli_connect('localhost','root','');
	// select database
	mysqli_select_db($con, 'library_database');
	//SELECT QUERY
    $sql = "UPDATE student SET std_id='$_POST[StudentID]',std_name='$_POST[StudentName]',
	fac_id='$_POST[FacultyID]',gender='$_POST[Gender]',cont_num='$_POST[ContactNumber]' 
	WHERE Std_id='$_POST[StudentID]'";
    //Execute the query
    if(mysqli_query($con,$sql))
    	header("refresh:1; url=StudentIndex.php");
    else
    	echo "Not Updated";

?>