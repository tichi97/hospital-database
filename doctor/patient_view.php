<!DOCTYPE html>
 <html>
 <head>
<title>Treatment form</title>
 <link rel="stylesheet" href="css/style2.css">
 <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
</head>
 <body>
 <button class="btn" type="button" id="back" onclick=""><a href="doc_home.html">Back</a> </button>
<div class=wrapper>
<h1>Treatments</h1>
 <?php
$connect = mysqli_connect("localhost:3306", "root", "") or die ("Error , check your server connection.");
mysqli_select_db($connect,"hospital");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($connect,"SELECT *,AES_DECRYPT(blood_type,'1234'), AES_DECRYPT(p_id,'1111') FROM patient");
?>

<table id="view" >
<tr >
<th >ID</th>
<th>Name</th>
<th>DOB</th>
<th>Gender</th>
<th>Blood Type</th>
</tr>

<?php
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row["AES_DECRYPT(p_id,'1111')"] . "</td>";
echo "<td>" . $row['p_name'] . "</td>";
echo "<td>" . $row['p_dob'] . "</td>";
echo "<td>" . $row['p_gender'] . "</td>";
// echo "<td>" . $row['blood_type'] . "</td>";
echo "<td>" . $row["AES_DECRYPT(blood_type,'1234')"] . "</td>";
echo "</tr>";
}
?>

</table>
</div>

</body>
</html>

