<!DOCTYPE html>
 <html>
 <body>
 <?php
// contact to database
$connect = mysqli_connect("localhost:3306", "root", "") or die ("Error , check your server connection.");
mysqli_select_db($connect,"hospital");
 
//Get data in local variable
$v_name=$_POST['p_name'];
$v_dob=$_POST['p_dob'];
$v_gender=$_POST['p_gender'];
$v_id=$_POST['p_id'];
$v_blood=$_POST['blood_type'];


 
// check for null values
if ($v_name==""  or $v_gender=="" or $v_dob=="") 
echo "All fields must be entered, hit back button and re-enter information";
else{
$query="insert into patient(p_id,p_name,p_dob,p_gender,blood_type) values(AES_ENCRYPT('$v_id','1111'),'$v_name','$v_dob','$v_gender',AES_ENCRYPT('$v_blood','1234'))";
mysqli_query($connect,$query)  or die('Error:'.mysqli_error($connect));
echo "Your message has been received";
}
 
?>
</body>
</html>

