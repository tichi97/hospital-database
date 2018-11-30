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
 

$query = "SELECT *,AES_DECRYPT(doc_id,'1111'),AES_DECRYPT(p_id,'1111'),AES_DECRYPT(diagnosis,'1111'),AES_DECRYPT(prescription,'1111') FROM treatment";
$result = mysqli_query($connect,$query);

?>
<button class="btn" type="button" id="back" onclick=""><a href="doc_home.html">Back</a> </button>
<div class=wrapper>
<h1>Update Treatment Form</h1>

<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">

                              <tr>
                                          <td >Treatment id</td>
                                          <td  ><input type="text" size=40 name="id"></td>
                              </tr>
                              <tr>
                                          <td >Patient id</td>
                                          <td  ><input type="text" size=40 name="p_id"></td>
                              </tr>
                              <tr>
                                          <td >Doctor id</td>
                                          <td  ><input type="text" size=40 name="doc_id"></td>
                              </tr>
                              <tr>
                                          <td >Diagnosis</td>
                                          <td  ><input type="text" size=80 name="diagnosis"></td>
                              </tr>
                              <tr>
                                          <td >prescription</td>
                                          <td  ><input type="text" size=80 name="prescription"></td>
                              </tr>
                              <tr>
                                          <td colspan=2 id="sub"><input class="btn" type="submit" name="submit" value="update" ></td>
                              </tr>
</table>
</form>



<?php

if(isset($_POST['submit']))
{

$id=$_POST['id'];

$doc_id=$_POST['doc_id'];
$p_id=$_POST['p_id'];
$diagnosis=$_POST['diagnosis'];
$prescription=$_POST['prescription'];

$result = mysqli_query($connect, "SELECT * FROM treatment WHERE t_id='$id'");
if(mysqli_num_rows($result) == 1)
{
$sql ="UPDATE treatment SET doc_id = AES_ENCRYPT('$doc_id','1111'), p_id = AES_ENCRYPT('$p_id','1111'), diagnosis = AES_ENCRYPT('$diagnosis','1111'), prescription = AES_ENCRYPT('$prescription','1111') WHERE t_id = '$id'";

mysqli_query($connect,$sql)  or die('Error:'.mysqli_error($connect));
echo "Your message has been updated";
}else{
      echo "that id does not exist";
}
}

 
?>
</body>
</html>