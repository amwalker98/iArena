<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "iarenadatabase";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno()) . ')' . mysqli_connect_error();
}

else {
	
	$sql_object = mysqli_query($conn, "SELECT teamname FROM teams ORDER BY RAND()");

$index = 1;	
	while ($row = mysqli_fetch_object($sql_object)) {
		
		echo $index,". ",$row->teamname;
		echo "<br>";
		
		$index = $index + 1;
}

mysqli_free_result($sql_object);
}
	
exit;
?>