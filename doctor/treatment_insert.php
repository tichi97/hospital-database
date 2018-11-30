<!DOCTYPE html>
 <html>
 <body>
 <?php
// contact to database
$connect = mysqli_connect("localhost:3306", "root", "") or die ("Error , check your server connection.");
mysqli_select_db($connect,"hospital");
 
//Get data in local variable
$v_id=$_POST['id'];
$v_date=$_POST['date'];
$v_doc_id=$_POST['doc_id'];
$v_p_id=$_POST['p_id'];
$v_diagnosis=$_POST['diagnosis'];
$v_prescription=$_POST['prescription'];


 
// check for null values
if ($v_id==""  or $v_date=="" or $v_doc_id=="" or $v_p_id=="" or $v_diagnosis=="" or $v_prescription=="") 
echo "All fields must be entered, hit back button and re-enter information";
else{
$query="insert into treatment(date, t_id, p_id, doc_id,diagnosis,prescription) values('$v_date','$v_id',AES_ENCRYPT('$v_p_id','1111'), AES_ENCRYPT('$v_doc_id','1111'),AES_ENCRYPT('$v_diagnosis','1111'), AES_ENCRYPT('$v_prescription','1111'))";
mysqli_query($connect,$query)  or die('Error:'.mysqli_error($connect));
echo "Your message has been received";
}
 
?>
</body>
</html>

