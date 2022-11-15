<html>
<head>
<style>
tbody {
  white-space: nowrap;
}

table {
  margin: 0 auto;
  overflow-x: auto;
  border-spacing: 0;
}

body{
    margin: 0;
    padding: 0;
    background: #ede0a7;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    font-family: sans-serif;
}
h2{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 24px;
    color: black;
    text-align: center;
}
</style>
<title>Delete Records</title>
</head>

<body>
   <h2>Student Details Delete</h2>
<table border=1 cellpadding=1 cellpadding=1>
   <tr>
      <th>Student ID</th>
      <th>Student Name</th>
      <th>Faculty ID</th>
      <th>Gender</th>
      <th>Contact Number</th>
   </tr>
   <?php
      //Connect with MYSQL
      $con = mysqli_connect ('localhost', 'root','');
      //Select Database
      mysqli_select_db ($con, 'library_database');
      //SELECT QUERY
      $sql = "SELECT * FROM student";
      //Execute the query
      $records =mysqli_query ($con, $sql);

   while($row = mysqli_fetch_array($records))
   {
      echo "<tr>";
      echo "<td>".$row['StudentID']."</td>";
      echo "<td>".$row['RoomID']."</td>";
      echo "<td>".$row['Fname']."</td>";
      echo "<td>".$row['Lname']."</td>";
      echo "<td>".$row['Age']."</td>";
      echo "<td>".$row['MobileNo']."</td>";
      echo "<td>".$row['Department']."</td>";
      echo "<td>".$row['Status']."</td>";
      echo "<td>".$row['Address']."</td>";
      echo "<td>".$row['HostelID']."</td>";
      echo "<td><a href=StudentDelete.php?StudentID=".$row['StudentID'].">Delete</a></td>";
   
   }
   ?>
</table>

</body>
</html>
