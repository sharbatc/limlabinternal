 <?php
  $servername = "172.24.155.100";
  $username = "akrami";
  $password = "Akrami2019!";
  $dbname = "akrami_db";
  $db = new mysqli($servername, $username, $password, $dbname);

  $query = "SELECT * FROM sess_started where sessiondate like CURDATE() and was_ended like 0 ORDER BY hostname;";
  $result = $db->query($query);
  echo "Today's Date :".date('Y-m-d');
  echo "<div class=\"col-sm-4\">";
  echo "<h4 class= \"text-justify\">Presently training </h4>";
  echo "<table class=\"table-hover table-bordered table-striped\"><tr><th class = \"text-justify\">Rig Name</th><th>Ratname</th><th>Start Time</th><th></tr>";
  while ($row = $result->fetch_assoc()){
  	echo "<tr>"; 
  	echo "<td>" . $row['hostname'] . "</td>";
  	echo "<td>" . $row['ratname'] . "</td>";
  	echo "<td>" . $row['starttime'] . "</td>";
  	echo "</tr>";
	}

  echo "</table><br>";
  echo "</div>";

  $last_query = "("."SELECT * from sess_started where sessiondate like CURDATE() and was_ended like 1 ORDER BY starttime DESC limit 6)"." ORDER BY hostname;";
  $result = $db->query($last_query);
  echo "<div class=\"col-sm-4\">";
  echo "<h4 class= \"text-justify\">Last trained </h4>";
  echo "<table class=\"table-hover table-bordered table-striped\"><tr><th class = \"text-justify\">Rig Name</th><th>Ratname</th><th>Start Time</th><th></tr>";
  while ($row = $result->fetch_assoc()){
  	echo "<tr>"; 
  	echo "<td>" . $row['hostname'] . "</td>";
  	echo "<td>" . $row['ratname'] . "</td>";
  	echo "<td>" . $row['starttime'] . "</td>";
  	echo "</tr>";
	}

  echo "</table><br>";
  echo "</div>";

 mysqli_close($db);
 ?> 