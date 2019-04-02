<?php
mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("digifarming") or die("No Database Found");
if(isset($_POST['submit'])){
	$Name=$_POST['cropname'];
	$Month=$_POST['emonth'];
	$Quantity=$_POST['equantity'];
	$query="insert into cropdetails(Name,Month,Quantity) values('$Name','$Month','$Quantity')";
	if(mysql_query($query)){
		echo "<script>window.open('details.html','_self')</script>";
	}
	else{
		echo "failed to query!!!";
	}
}
?>