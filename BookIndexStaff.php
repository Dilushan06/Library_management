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
    background: #7cd7fe;
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</style>
<title>Update Records</title>
</head>
<body>
   <h2>BOOK DETAILS UPDATE</h2>
<?php
   //Connect with MYSQL
   $con = mysqli_connect ('localhost', 'root','');
   //Select Database
   mysqli_select_db ($con, 'library_database');
   //SELECT QUERY
   $sql = "SELECT * FROM book";
   //Execute the query
   $records =mysqli_query ($con, $sql);
?>
<table>
   <tr>
      <th>Book ID</th>
      <th>Book Title</th>
      <th>Publisher</th>
      <th>Author</th>
      <th>Catrgory</th>
      <th>Cost</th>
   </tr>
   <?php
   while($row = mysqli_fetch_array($records))
   {
      echo "<tr><form action=BookUpdate.php method=post>";
      echo "<td><input type=label name=BookID value='".$row['book_id']."'></td>";
      echo "<td><input type=text name=BookTitle value='".$row['book_title']."'></td>";
      echo "<td><input type=text name=Publisher value='".$row['publisher']."'></td>";
      echo "<td><input type=text name=Author value='".$row['author']."'></td>";
      echo "<td><input type=text name=Category Number value='".$row['category']."'></td>";
      echo "<td><input type=text name=Cost Number value='".$row['cost']."'></td>";
      echo "<td><input type=submit value=EDIT>";
      echo "<td><a href=BookDelete.php?book_id=".$row['book_id'].">DELETE</a></td>";
      echo "</form></tr>";
   }
   ?>
</table>

</body>
</html>
