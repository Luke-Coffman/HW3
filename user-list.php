<html>
	<head>
	<title>Hw 3 User List</title>
	</head>
		<h1>User List</h1>
		
		<form action= 'http://localhost:/HW3/user-add/.php'> <button type = 'submit'> Add a User </button><br><br>
	<body>
	</body>
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
	username: <a href='user-details.php?username=$row[username]'>$row[username]</a>
	</pre>
	
_END;

}

$conn->close();



?>
	
</html>