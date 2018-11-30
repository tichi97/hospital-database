<!DOCTYPE html>
 <head>
<title>Treatment form</title>
 <link rel="stylesheet" href="css/style2.css">
 <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
</head>
 <body>
 <button class="btn" type="button" id="back" onclick=""><a href="man_home.html">Back</a> </button>
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

$result = mysqli_query($connect,"SELECT *,AES_DECRYPT(p_id,'1111'),AES_DECRYPT(doc_id,'1111') FROM treatment");
?>
<table id="view">
<tr>
<th>date</th>
<th>treatement id</th>
<th>patient id</th>
<th>doctor id</th>
<th>diagnosis</th>
<th>prescription</th>
</tr>

<?php
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['date'] . "</td>";
echo "<td>" . $row['t_id'] . "</td>";
echo "<td>" . $row["AES_DECRYPT(p_id,'1111')"] . "</td>";
echo "<td>" . $row["AES_DECRYPT(doc_id,'1111')"] . "</td>";
echo "<td>" . $row['diagnosis'] . "</td>";
echo "<td>" . $row['prescription'] . "</td>";



echo "</tr>";
}
?>
</table>
</div>



</body>
</html>

