<?php

$username = $_POST['validateusrname'];
$rawpassword = $_POST['validatepw'];
$check;

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "iarenadatabase";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno()) . ')' . mysqli_connect_error();
} else {
	
	$passwordhash = hash('sha256', $rawpassword);

    $result = mysqli_query($conn, "SELECT * FROM iarenadbtable
    WHERE Username = '$username' AND Password = '$passwordhash'");

    if (mysqli_num_rows($result) != 0) {
        $check = true;
        echo json_encode($check);
    } else {
        $check = false;
        echo json_encode($check);
    }

    $conn->close();
}

exit;
?>