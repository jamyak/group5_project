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

<?php
@$dbConnect = new mysqli('localhost', 'root', '', 'accounts');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
}

// get data from the input boxes 
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];	   
$type = 'user';
$compname = $_POST['compname'];

if (!$firstname || !$lastname || !$email || !$phone || !$password || !$compname) {
    echo "<p>You have not entered all the required information. </p>";
    exit;
}

// add slashes if add and strip slashes default is not turned on
// magic_quotes_gpc is off by default in XAMPP, add \ if value contains a quote
/*if (!get_magic_quotes_gpc()){
	$firstname = addslashes($firstname); 
	$lastname = addslashes($lastname);
	$email = addslashes($email);
	$phone = addslashes($phone);
	$password = addslashes($password);
}*/

// insert into contact database
$sqlString = "INSERT into tbluser values " .
	"(0, '$firstname', '$lastname', '$email', '$phone', '$password', '$type', '$compname')";
$result = $dbConnect->query($sqlString);
if (!$result){	
	echo ("<p>Error: Registration information was not added.</p>" .
			"<p>Error code $dbConnect->errno: $dbConnect->error. </p>");
	$dbConnect->close();
	exit;
	}

$dbConnect->close();
//** end of input processing
?>
<h1>Thank You for Registering</h1>
<table>
	<tr>
		<td>User Id:</td>
		<td>First Name:</td>
		<td>Last Name:</td>
		<td>Email:</td>
		<td>Phone:</td>
		<td>Type:</td>
		<td>Company Name:</td>
	</tr>	

<?php 
@$dbConnect = new mysqli('localhost', 'root', '', 'accounts');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}
$data = mysqli_query(@$dbConnect, "SELECT * FROM tbluser where firstname = '$firstname' && email = '$email' && password = '$password'") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $data )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['userid'] . "</td>";
 echo "<td>" .$info['firstname'] . " </td>";
 echo "<td>" .$info['lastname']. " </td>";
 echo "<td>" .$info['email']. " </td>";
 echo "<td>" .$info['phone']. " </td>";
 echo "<td>" .$info['type']. " </td>";
 echo "<td>" .$info['compname']. " </td>";
 echo "</tr>";
 } 


//include'eventregistration.html'
?>
</table>
</div>
</div>
</body>
</html>
