<html>
	<head>
	<title>Hw 3 User Details</title>
	</head>
		<h1>User Details</h1>
		
		<form action= 'http://localhost/HW3/user-add.php'> <button type = 'submit'> Add a User </button><br><br>
	<body>
	
	</body>
</html>

<?php

require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM user";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<pre>
	id: $row[id]
	username: $row[username]
	forename: $row[forename]
	surname: $row[surname]
	password: $row[password]
	</pre>
	
_END;

}

$conn->close();



?>