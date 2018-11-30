<!DOCTYPE html>
 <html>
 <body>
 <?php
// contact to database
$connect = mysqli_connect("localhost:3306", "root", "") or die ("Error , check your server connection.");
mysqli_select_db($connect,"hospital");
 
//Get data in local variable
$v_username=$_POST['username'];
$v_password=$_POST['password'];
$v_confirm_password=$_POST['confirm_password'];
$v_type=$_POST['type'];

//confirm passwords
if ($v_password != $v_confirm_password) {
echo("Error... Passwords do not match");
exit;
}

$hashedpassword = sha1($v_password);


 
// check for null values
if ($v_username==""  or $v_password=="" or $v_type=="") 
echo "All fields must be entered, hit back button and re-enter information";
else{
$query="insert into users(username,password,type) values('$v_username','$hashedpassword','$v_type')";
mysqli_query($connect,$query)  or die('Error:'.mysqli_error($connect));
echo "Your message has been received";
}
 
?>
</body>
</html>

