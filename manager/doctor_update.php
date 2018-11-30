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
<h1>Update Doctor Form</h1>
 

 <?php
// contact to database
$connect = mysqli_connect("localhost:3306", "root", "") or die ("Error , check your server connection.");
mysqli_select_db($connect,"hospital");
 

$query = "SELECT *, AES_DECRYPT(doc_id,'1111') FROM doctor";
$result = mysqli_query($connect,$query);

?>


<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">

                              <tr>
                                          <td >Name*</td>
                                          <td  ><input type="text" size=40 name="name"></td>
                              </tr>
                              <tr>
                                          <td >Doctor id</td>
                                          <td  ><input type="text" size=40 name="id"></td>
                              </tr>
                              <tr>
                                          <td >Specialty</td>
                                          <td  ><input type="text" size=40 name="specialty"></td>
                              </tr>
                              <tr>
                                          <td colspan=2 id="sub"><input class="btn" type="submit" name="submit" value="update" ></td>
                              </tr>
</table>
</form>
</div>


<?php

if(isset($_POST['submit']))
{
$v_name=$_POST['name'];
$v_specialty=$_POST['specialty'];
$id=$_POST['id'];

$result = mysqli_query($connect, "SELECT * FROM doctor WHERE AES_DECRYPT(doc_id,'1111')='$id'");
if(mysqli_num_rows($result) == 1)
{
$sql ="UPDATE doctor SET doc_name = '$v_name', doc_specialty = '$v_specialty' WHERE AES_DECRYPT(doc_id,'1111') = '$id'";

mysqli_query($connect,$sql)  or die('Error:'.mysqli_error($connect));
echo "Your message has been updated";
}else{
      echo "that id does not exist";
}
}

 
?>
</body>
</html>