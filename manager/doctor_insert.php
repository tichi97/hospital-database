<!DOCTYPE html>
 <html>
 <body>
 <?php
// contact to database
$connect = mysqli_connect("localhost:3306", "root", "") or die ("Error , check your server connection.");
mysqli_select_db($connect,"hospital");
 
//Get data in local variable
$v_name=$_POST['name'];
$v_specialty=$_POST['specialty'];
$v_id=$_POST['id'];

// check for null values
if ($v_name==""  or $v_id=="") 
echo "All fields must be entered, hit back button and re-enter information";
else{
$query="insert into doctor(doc_id,doc_name,doc_specialty) values(AES_ENCRYPT('$v_id','1111'),'$v_name','$v_specialty')";
mysqli_query($connect,$query)  or die('Error:'.mysqli_error($connect));
echo "Your message has been received";
}
 
?>
</body>
</html>

