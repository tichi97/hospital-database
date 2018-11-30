<!DOCTYPE html>
 <html>
 <body>
 <?php
// contact to database
$connect = mysqli_connect("localhost:3306", "root", "") or die ("Error , check your server connection.");
mysqli_select_db($connect,"hospital");
 
//Get data in local variable
$v_name=$_POST['name'];

$v_id=$_POST['id'];



 
// check for null values
if ($v_name==""  or $v_id=="") 
echo "All fields must be entered, hit back button and re-enter information";
else{
$query="insert into manager(man_id,man_name) values('$v_id','$v_name')";
mysqli_query($connect,$query)  or die('Error:'.mysqli_error($connect));
echo "Your message has been received";
}
 
?>
</body>
</html>

