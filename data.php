<?php
header('Content-Type: application/json');
session_start();
$cropname=$_SESSION['c'];
//require_once('db.php');
$mysqli=new mysqli("localhost","root","","digifarming") or die("Unable to connect to database".mysql_error());
if(!$mysqli){
	die("Connection failed: ". $mysqli->error);
}
$sqlQuery =sprintf("select previousdatabase.State,cropdetails.Quantity*previousdatabase.PricePerTonne as 'TotalPrice' from cropdetails INNER JOIN previousdatabase on cropdetails.Name=previousdatabase.CropName");
$result = $mysqli->query($sqlQuery);
$data = array();
foreach($result as $row) {
		 $data[] = $row;
}
$result->close();
$mysqli->close();
echo json_encode($data);
?>