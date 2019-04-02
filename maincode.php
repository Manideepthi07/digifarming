<?php
$cropname=isset($_POST["cropname"]) ?$_POST["cropname"]:" ";
$cropname=mysql_real_escape_string($cropname);
mysql_connect("localhost","root","") or die("Unable to connect to database".mysql_error());
mysql_select_db("digifarming");
$q1="select cropdetails.Name,previousdatabase.State,previousdatabase.PricePerTonne,cropdetails.Quantity,cropdetails.Quantity*previousdatabase.PricePerTonne from cropdetails INNER JOIN previousdatabase on cropdetails.Name=previousdatabase.CropName";
$result= mysql_query($q1) or die("Unable to query the data".mysql_error());
echo "<table border=1>";
echo "<th>CropName</th>";
echo "<th>State</th>";
echo "<th>PricePerTonne</th>";
echo "<th>Quantity</th>";
echo "<th>TotalPrice</th>";
while($row=mysql_fetch_array($result,MYSQL_NUM)){
 echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" .  $row[4] ."</td></tr>";
}
echo "</table>";
session_start();
$_SESSION['c']=$cropname;
include('bargraph.html');
?>