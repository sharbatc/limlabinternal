 <?php
  $servername = "172.24.155.100";
  $username = "akrami";
  $password = "Akrami2019!";
  $dbname = "akrami_db";
  $db = new mysqli($servername, $username, $password, $dbname);//set your database handler
  $query = "SELECT * FROM sess_started where sessiondate like CURDATE() and was_ended like 0;";
  $result = $db->query($query);

  echo "<table class=\"table-hover table-bordered table-striped\"><tr><th class = \"text-justify\">Rig Name</th><th>Ratname</th><th>Date</th><th>Start Time</th><th></tr>";
  while ($row = $result->fetch_assoc()){
  	echo "<tr>"; 
  	echo "<td>" . $row['hostname'] . "</td>";
  	echo "<td>" . $row['ratname'] . "</td>";
  	echo "<td>" . $row['sessiondate'] . "</td>";
  	echo "<td>" . $row['starttime'] . "</td>";
  	echo "</tr>";
 }

 echo "</table><br><br>";

 mysqli_close($db);
 ?> 