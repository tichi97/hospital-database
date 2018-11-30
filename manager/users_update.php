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
<h1>New Doctor Form</h1>
 <?php
// contact to database
$connect = mysqli_connect("localhost:3306", "root", "") or die ("Error , check your server connection.");
mysqli_select_db($connect,"hospital");
 

$query = "SELECT *,AES_DECRYPT(doc_id,'1111'),AES_DECRYPT(p_id,'1111'),AES_DECRYPT(diagnosis,'1111'),AES_DECRYPT(prescription,'1111') FROM treatment";
$result = mysqli_query($connect,$query);

?>


<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">

                          <tr>
                                          <td >Username</td>
                                          <td  ><input type="text" size=40 name="username"></td>
                              </tr>
                              <tr>
                                          <td >password</td>
                                          <td  ><input type="password" size=40 name="password"></td>
                              </tr>
                              <tr>
                                          <td >confirm password</td>
                                          <td  ><input type="password" size=40 name="confirm_password"></td>
                              </tr>
                              <tr>
                                          <td >Type</td>
                                          <td  ><select name="type" size="1" >
                                                  <option value="Doctor" selected="">doctor</option>
                                                  <option value="Manager">manager</option>
                              </select></td>
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

$v_username=$_POST['username'];
$v_password=$_POST['password'];
$v_confirm_password=$_POST['confirm_password'];
$v_type=$_POST['type'];

$hashedpassword = sha1($v_password);

$result = mysqli_query($connect, "SELECT * FROM users WHERE username='$v_username'");
if(mysqli_num_rows($result) == 1)
{
$sql ="UPDATE users SET password = '$hashedpassword', type = '$v_type' WHERE username = '$v_username'";

mysqli_query($connect,$sql)  or die('Error:'.mysqli_error($connect));
echo "Your message has been updated";
}else{
      echo "that user does not exist";
}

}

 
?>
</body>
</html>