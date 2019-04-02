<?php
$UserName=$_POST['uname'];
$PhoneNumber=$_POST['phno'];
$UserName=stripcslashes($UserName);
$PhoneNumber=stripcslashes($PhoneNumber);
$UserName=db2_escape_string($UserName);
$PhoneNumber=db2_escape_string($PhoneNumber);
$database="BLUDB";
$user="dlf90618";
$password="67dxjg7x2t-97hl5";
$conn=db2_connect($database,$user,$password);
if(!$conn){
	echo "Connection failed";
}
$result=db2_exec($conn,"select * from FARMERS where USERNAME='$UserName' and PHONENUMBER='$PhoneNumber'");
while($row=db2_fetch_array($result)){
if($row['UserName']==$UserName && $row['PhoneNumber']==$PhoneNumber){
	echo "<script>window.open('details.html','_self')</script>";
}
else{
	echo "Email or password incorrect";
}
}
?>
