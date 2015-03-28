<?php
error_reporting(E_ALL);

if($_GET["myusername"] && $_GET["mypassword"] && $_GET["mypassword2"] )
{
if($_GET["mypassword"]==$_GET["mypassword2"])
{
$servername="localhost";
$username="snaphack";
$password="SwFqhaseHX3MMKbt";
$conn= mysql_connect($servername,$username,$password)or die(mysql_error());
mysql_select_db("snaphack_data",$conn);
$sql="insert into members (username,password)values('$_GET[myusername]','$_GET[mypassword]')";
$result=mysql_query($sql,$conn) or die(mysql_error());
echo "<script type='text/javascript'>alert('Registration Complete!');</script>";

print "<a href='index.php'>Login Page</a>";
}
else print "Passwords don't match. Please try again.";
}
else print"Something is not right here, Please try again";
?>
