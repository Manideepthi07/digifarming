<?php
header('Content-Type: application/json');
session_start();
$cropname=$_SESSION['c'];
$database="BLUDB";
$user="dlf90618";
$password="67dxjg7x2t-97hl5";
$conn=db2_connect($database,$user,$password);
if(!$conn){
	echo "Connection failed";
}
$sqlQuery =db2_prepare($conn,"select previousdatabase.State,cropdetails.Quantity*previousdatabase.PricePerTonne as 'TotalPrice' from cropdetails INNER JOIN previousdatabase on cropdetails.Name=previousdatabase.CropName");
$result = db2_execute($sqlQuery);
$data = array();
while($row=db2_fetch_array($result)) {
		 $data[] = $row;
}
echo json_encode($data);
?>
