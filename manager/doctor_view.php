<!DOCTYPE html>
 <html>
 <head>
<title>Doctor form</title>
 <link rel="stylesheet" href="css/style2.css">
 <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
</head>
 <body>
 <button class="btn" type="button" id="back" onclick=""><a href="man_home.html">Back</a> </button>
<div class=wrapper>
<h1>Doctors</h1>
 <?php
$connect = mysqli_connect("localhost:3306", "root", "") or die ("Error , check your server connection.");
mysqli_select_db($connect,"hospital");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($connect,"SELECT *, AES_DECRYPT(doc_id,'1111') FROM doctor");
?>

<table id="view">
<tr>
<th>id</th>
<th>name</th>
<th>specialty</th>
</tr>

<?php

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row["AES_DECRYPT(doc_id,'1111')"] . "</td>";
echo "<td>" . $row['doc_name'] . "</td>";
echo "<td>" . $row['doc_specialty'] . "</td>";
echo "</tr>";
}
?>
</table>
</div>


</body>
</html>

