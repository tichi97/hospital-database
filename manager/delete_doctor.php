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
<h1>Delete Doctor</h1>
 <?php
// contact to database
$connect = mysqli_connect("localhost:3306", "root", "") or die ("Error , check your server connection.");
mysqli_select_db($connect,"hospital");
 

?>


<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">

                              <tr>
                                          <td >Doctor id</td>
                                          <td  ><input type="text" size=40 name="id"></td>
                              </tr>
                              <tr>
                                          <td colspan=2 id="sub"><input class="btn" type="submit" name="submit" value="delete" ></td>
                              </tr>
</table>
</form>
</div>


<?php

if(isset($_POST['submit']))
{
$id=$_POST['id'];

$result = mysqli_query($connect, "SELECT * FROM doctor WHERE AES_DECRYPT(doc_id,'1111')='$id'");
if(mysqli_num_rows($result) == 1)
{
$sql ="DELETE from doctor WHERE AES_DECRYPT(doc_id,'1111') = '$id'";

mysqli_query($connect,$sql)  or die('Error:'.mysqli_error($connect));
echo "Delete confirmed";
}else{
      echo "that id does not exist";
}
}

 
?>
</body>
</html>