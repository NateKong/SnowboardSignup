<?php

$servername = "snowboard-mysql";
$username = "root";
$password = "nate";
$dbname = "epic";
$data = '';

// Create connection
$conn = new \mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM pass";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $id = 1;
  while($row = $result->fetch_assoc()) {
    $data .=
      '<li class="collection-item">
        <div class="row">
    		  <div class="col s1">
        		<button class="btn waves-effect red" id="delete' . $id .'">delete</button>
        	</div>
          <div id="name' . $id . '" class="col s4">' . $row["name"] . '</div>
        	<div class="col s3">' . date( "m/d/Y", strtotime ($row["date"])) . '</div>
        	<div class="col s4">' . $row["pass"] . '</div>
        </div>
      </li>';
    $id++;
  }
} else {
    echo "";
}

$conn->close();

echo $data;

?>