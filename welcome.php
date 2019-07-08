<html>
<body>

<?php

$servername = "172.24.155.100";
$username = "akrami";
$password = "Akrami2019!";
$dbname = "akrami_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: ".mysql_connect_error());
}
$sql = "SELECT experimenter, ratname from ".$conn->real_escape_string($_POST["tablename"])." where sessiondate like '".$conn->real_escape_string($_POST["date"]). "';";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		echo "experimenter : ". $row["experimenter"]. " ratname " .$row["ratname"] . " <br>";
	}
}
else {
	echo "0 results";
}

mysqli_close($conn);

?>

</body>
</html>
