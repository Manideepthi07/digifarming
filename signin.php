<?php
$UserName=$_POST['uname'];
$PhoneNumber=$_POST['phno'];
$UserName=stripcslashes($UserName);
$PhoneNumber=stripcslashes($PhoneNumber);
$UserName=mysql_real_escape_string($UserName);
$PhoneNumber=mysql_real_escape_string($PhoneNumber);
mysql_connect("localhost","root","");
mysql_select_db("digifarming");
$result=mysql_query("select * from farmers where UserName='$UserName' and PhoneNumber='$PhoneNumber'") or
 die("Failed to query database".mysql_error());
$row=mysql_fetch_array($result);
if($row['UserName']==$UserName && $row['PhoneNumber']==$PhoneNumber){
	echo "<script>window.open('details.html','_self')</script>";
}
else{
	echo "Email or password incorrect";
}
?>
