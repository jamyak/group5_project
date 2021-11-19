<!DOCTYPE html>
<html>
<head>
	<title>U & Us | Account Information</title>
	<link rel="stylesheet" type="text/css" href="./styles/media.css">
	<link rel="stylesheet" type="text/css" href="./styles/table.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
</head>
	<nav class="navbar">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="./index.html" class="nav-link">
					<div class="link-text">Home</div></a>
			</li>
			<li class="nav-item">
				<a href="./services.html" class="nav-link">
					<div class="link-text">Services</div></a>
			</li>
			<li class="nav-item">
				<a href="./aboutus.html" class="nav-link">
					<div class="link-text">Contact Us</div></a>
			</li>	
			<li class="nav-item">
				<a href="./account.html" class="nav-link">
					<div class="link-text">Account</div></a>
			</li>										
		</ul>
	</nav>
<body>
<div class="webcontainer">
		<br><br><br>
			<p id="title1">U & Us</p>
			<h2>Warehousing and Logistics</h2> 
	<div class="contentcontainer">
	<h1>Account Info:</h1>
	<table>
	<tr>
		<td>User Id</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Phone</td>
		<td>Type</td>
		<td>Company Name</td>
	</tr>

<p>Associated information with your account:</p>
<?php
@$dbConnect = new mysqli('localhost', 'root', '', 'accounts');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
}
 
// get data from the input boxes 
$email = $_POST['email'];
$password = $_POST['password'];
$type = $_POST['type'];

if (!$email || !$password || !$type) {
    echo "<p>You have not entered all the required information. </p>";
    exit;
}

if($email == 'admin' && $password == 'admin' && $type == 'admin')
{

$data = mysqli_query(@$dbConnect, "SELECT * FROM tbluser order by userId desc") 
 or die(""); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $data )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['userid'] . "</td>";
 echo "<td>".$info['firstname'] . " </td>";
 echo "<td>".$info['lastname']. " </td>";
 echo "<td>" .$info['email']. " </td>";
 echo "<td>" .$info['phone']. " </td>";
 echo "<td>" .$info['type']. " </td>";
 echo "<td>" .$info['compname']. " </td>";
 echo "</tr>";
 } 
?>
	
<?php
}
else
{
echo "";

$data = mysqli_query(@$dbConnect, "SELECT * FROM tbluser where email = '$email' && password = '$password'") 
 or die(""); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $data )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['userid'] . "</td>";
 echo "<td>".$info['firstname'] . " </td>";
 echo "<td>".$info['lastname']. " </td>";
 echo "<td>" .$info['email']. " </td>";
 echo "<td>" .$info['phone']. " </td>";
 echo "<td>" .$info['type']. " </td>";
 echo "<td>" .$info['compname']. " </td>";
 echo "</tr>";
} 
 ?>
	
<?php
@$dbConnect = new mysqli('localhost', 'root', '', 'accounts');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}
$data = mysqli_query(@$dbConnect, "SELECT * FROM tblevent where email = '$email'") 
 or die(""); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $data )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['eventid'] . "</td>";
 echo "<td>".$info['datee'] . " </td>";
 echo "<td>".$info['phone']. " </td>";
 echo "<td>" .$info['guests']. " </td>";
 echo "<td>" .$info['eventtype']. " </td>";
 echo "<td>" .$info['venuetype']. " </td>";
 echo "<td>" .$info['foodtype']. " </td>";
 echo "<td>" .$info['decorationtype']. " </td>";
 echo "<td>" .$info['userid']. " </td>";
 echo "<td>" .$info['customerprice']. " </td>";
 echo "</tr>";
 }
}

?>
</table>
</div>
</div>
</body>
</html>