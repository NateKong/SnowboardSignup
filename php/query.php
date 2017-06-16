<?php
$servername = "localhost";
$username = "root";
$password = "nate";
$dbname = "epic";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM pass";
$result = $conn->query($sql);
$data = '';

if ($result->num_rows > 0) {
  // output data of each row

  while($row = $result->fetch_assoc()) {
    $id = 1;
    $data .=
      '<li class="collection-item">
        <div class="row">
    		  <div class="col s1">
        		<button class="btn waves-effect red" style="display: none" id="delete' . $id .'">delete</button>
        	</div>
          <div id="name' . $id . '" class="col s4">' . $row["name"] . '</div>
        	<div class="col s3">' . date( "m/d/Y", strtotime ($row["date"])) . '</div>
        	<div class="col s4">' . $row["pass"] . '</div>
        </div>
      </li>';
    $id++;
  }
} else {
    echo "Be the first one!!!";
}

$conn->close();

echo $data;

?>