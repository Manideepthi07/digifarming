<?php
$cropname=isset($_POST["cropname"]) ?$_POST["cropname"]:" ";
$cropname=db2_escape_string($cropname);
$database="BLUDB";
$user="dlf90618";
$password="67dxjg7x2t-97hl5";
$conn=db2_connect($database,$user,$password);
if(!$conn){
	echo "Connection failed";
}
$result=db2_exec($conn,"select cropdetails.Name,previousdatabase.State,previousdatabase.PricePerTonne,cropdetails.Quantity,cropdetails.Quantity*previousdatabase.PricePerTonne from cropdetails INNER JOIN previousdatabase on cropdetails.Name=previousdatabase.CropName");
echo "<table border=1>";
echo "<th>CropName</th>";
echo "<th>State</th>";
echo "<th>PricePerTonne</th>";
echo "<th>Quantity</th>";
echo "<th>TotalPrice</th>";
while($row=db2_fetch_array($result,MYSQL_NUM)){
 echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" .  $row[4] ."</td></tr>";
}
echo "</table>";
session_start();
$_SESSION['c']=$cropname;
include('bargraph.html');
?>
