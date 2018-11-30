<!DOCTYPE html>
 <html>
 <head>
<title>User form</title>
 <link rel="stylesheet" href="css/style2.css">
 <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
</head>
 <body>
 <button class="btn" type="button" id="back" onclick=""><a href="man_home.html">Back</a> </button>
<div class=wrapper>
<h1>Users</h1>

 <?php
$connect = mysqli_connect("localhost:3306", "root", "") or die ("Error , check your server connection.");
mysqli_select_db($connect,"hospital");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($connect,"SELECT * FROM users");
?>

<table id="view">
<tr>
<th>username</th>
<th>password</th>
<th>type</th>
</tr>

<?php

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['password'] . "</td>";
echo "<td>" . $row['type'] . "</td>";
echo "</tr>";
}
?>

</table>
</div>


</body>
</html>

