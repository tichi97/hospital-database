<!DOCTYPE html>
 <html>
 <head>
 <link rel="stylesheet" href="css/style2.css">
 <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
 </head>
 <body>
 <?php
// contact to database
$connect = mysqli_connect("localhost:3306", "root", "") or die ("Error , check your server connection.");
mysqli_select_db($connect,"hospital");
 

$query = "SELECT *,AES_DECRYPT(blood_type,'1234'),AES_DECRYPT(p_id,'1111') FROM patient";
$result = mysqli_query($connect,$query);

?>
<button class="btn" type="button" id="back" onclick=""><a href="doc_home.html">Back</a> </button>
<div class=wrapper>
<h1>Update Patient Form</h1>
<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">
<tr>



                                          <td >ID</td>
                                          <td  ><input type="text" size=40 name="p_id"  ></td>
</tr>
                              
<tr>
                                          <td >Name*</td>
                                          <td  ><input type="text" size=40 name="p_name"  ></td>
                              </tr>
                              <tr>
                                          <td >DOB</td>
                                          <td  ><input type="date" size=40 name="p_dob" ></td>
                              </tr>
                              <tr>
                                          <td >Gender</td>
                                          <td  ><input type="text" size=40 name="p_gender" > </td>
                              </tr>
                              <tr>
                                          <td >Blood type</td>
                                          <td  ><input type="text" size=40 name="blood_type" ></td>
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

$name=$_POST['p_name'];
$dob=$_POST['p_dob'];
$gender=$_POST['p_gender'];
$id=$_POST['p_id'];
$blood_type=$_POST['blood_type'];



$result = mysqli_query($connect, "SELECT * FROM patient WHERE AES_DECRYPT(p_id,'1111') = '$id'");
if(mysqli_num_rows($result) == 1)
{
$sql ="UPDATE patient SET p_name = '$name', p_dob = '$dob', p_gender = '$gender', blood_type = AES_ENCRYPT('$blood_type','1234') WHERE AES_DECRYPT(p_id,'1111') = '$id'";
mysqli_query($connect,$sql)  or die('Error:'.mysqli_error($connect));
echo "Your message has been updated";
}else{
      echo "that user does not exist";
}
}

 
?>
</body>
</html>