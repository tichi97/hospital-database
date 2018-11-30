<!DOCTYPE html>
 <html>
 <body>
 <?php
// contact to database
$connect = mysqli_connect("localhost:3306", "root", "") or die ("Error , check your server connection.");
mysqli_select_db($connect,"hospital");

 
 session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username=$_POST['username'];
$password=$_POST['password'];
	$hash=sha1($password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM users WHERE username='$username'
and password='$hash'";
	$result = mysqli_query($connect,$query) or die(mysqli_error($connect));
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
	    while($row = mysqli_fetch_assoc($result)) {
    $type = $row['type'];}
    if($type=="Doctor"){
    	header("Location: doctor/doc_home.html");
    }else{
    	header("Location: manager/man_home.html");
    }
	     
//echo "Your message has been received";
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.html'>try again</a></div>";

	}
    }
 
?>
</body>
</html>

