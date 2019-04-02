<?php
$database="BLUDB";
$user="dlf90618";
$password="67dxjg7x2t-97hl5";
$conn=db2_connect($database,$user,$password);
if(!$conn){
	echo "Connection failed";
}
if(isset($_POST['submit'])){
	$Name=$_POST['cropname'];
	$Month=$_POST['emonth'];
	$Quantity=$_POST['equantity'];
	$res=db2_exec($conn,"insert into CROPDETAILS(NAME,MONTH,QUANTITY) values('$Name','$Month','$Quantity')");
        if($res){
	echo "<script>window.open('details.html','_self')</script>";
	}
}
?>
