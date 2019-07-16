<?php
  $servername = "172.24.155.100";
  $username = "akrami";
  $password = "Akrami2019!";
  $dbname = "akrami_db";
  $db = new mysqli($servername, $username, $password, $dbname);

  $query = "SELECT * FROM sess_started where sessiondate like CURDATE() and was_ended like 0 ORDER BY hostname;";
  $result = $db->query($query);
  echo "<div class = \"row\">";
  echo "<div class=\"col-sm-6\">";
  echo "<h4 class= \"text-center\">Presently training </h4>";
  echo "<table class=\"table-hover table-bordered table-striped text-center\" align=\"center\"><tr><th class = \"text-center\">Rig</th><th class = \"text-center\">Ratname</th><th class = \"text-center\">Start Time</th></tr>";
  while ($row = $result->fetch_assoc()){
  	echo "<tr>"; 
    $camera_url = "http://172.24.155.1".substr($row['hostname'], -2).":8000";
    echo "<td>" . "<a href=\"".$camera_url."\" target = \"_blank\">".$row['hostname'] . "</a></td>";
  	echo "<td>" . $row['ratname'] . "</td>";
  	echo "<td>" . $row['starttime'] . "</td>";
  	echo "</tr>";
	}

  echo "</table><br>";
  echo "</div>";

  // For some reason, "(" needed for the string to be parsed properly
  $last_query = "("."SELECT * from sess_started where sessiondate like CURDATE() and was_ended like 1 ORDER BY starttime DESC limit 6)"." ORDER BY hostname;";
  $result = $db->query($last_query);
  echo "<div class=\"col-sm-6\">";
  echo "<h4 class= \"text-center\">Last trained </h4>";
  echo "<table class=\"table-hover table-bordered table-striped text-center\" align=\"center\"><tr><th class = \"text-center\">Rig</th><th class = \"text-center\">Ratname</th><th class = \"text-center\">Start Time</th><th class = \"text-center\">End Time</th></tr>";
  while ($row = $result->fetch_assoc()){
  	echo "<tr>"; 
    echo "<td>" . $row['hostname'] . "</td>";
  	echo "<td>" . $row['ratname'] . "</td>";
  	echo "<td>" . $row['starttime'] . "</td>";
    $endtimequery = "SELECT endtime from sessions where sessid like ".$row['sessid'].";";
    $endtime = $db->query();
    echo "<td>" . $endtime . "</td>";
    echo "<td>" . 
  	echo "</tr>";
	}

  echo "</table><br>";
  echo "</div>";
  echo "</div>";

 mysqli_close($db);
?> 