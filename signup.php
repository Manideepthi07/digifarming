<?php
$database="BLUDB";
$user="dlf90618";
$password="67dxjg7x2t-97hl5";
$conn=db2_connect($database,$user,$password);
if(!$conn){
	echo "Connection failed";
}
if(isset($_POST['submit'])){
	$UserName=$_POST['uname'];
	$PhoneNumber=$_POST['phno'];
	$District=$_POST['district'];
	$State=$_POST['state'];
	db2_exec($conn,"insert into FARMERS(USERNAME,PHONENUMBER,DISTRICT,STATE) values('$UserName','$PhoneNumber','$District','$State')");
	db2_close($conn);
	echo "<script>window.open('details.html','_self')</script>";
}
?>
