<?php
mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("digifarming") or die("No Database Found");
if(isset($_POST['submit'])){
	$UserName=$_POST['uname'];
	$PhoneNumber=$_POST['phno'];
	$District=$_POST['district'];
	$State=$_POST['state'];
	$query="insert into farmers(UserName,PhoneNumber,District,State) values('$UserName','$PhoneNumber','$District','$State')";
	if(mysql_query($query)){
		echo "<script>window.open('details.html','_self')</script>";
	}
	else{
		echo "failed to query!!!";
	}
}
?>