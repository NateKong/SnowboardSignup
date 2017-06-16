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






$querySql = "SELECT * FROM pass";
$result = $conn->query($querySql);
$data = '<li class="collection-item">
            <div class="row" >
              <div class="col s1 switch">
                <label>
                	<input id="checkbox-delete" type="checkbox">
                	<span class="lever"></span>
                </label>
              </div>
              <div class="col s4 "><strong>Name</strong></div>
              <div class="col s3 "><strong>Birthday</strong></div>
              <div class="col s4 "><strong>Pass</strong></div>
            </div>
         </li>
          <script>
           	$("input#checkbox-delete").change(function() {
				$("button").toggle();
			});
		  </script>';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $data .=
	        '<li class="collection-item">
               <div class="row">
        		 <div class="col s1">
            		<button class="btn waves-effect red" style="display: none">delete</button>
            	 </div>
            	 <div id="name1" class="col s4">' . $row["name"] . '</div>
            	 <div class="col s3">' . date( "m/d/Y", strtotime ($row["date"])) . '</div>
            	 <div class="col s4">' . $row["pass"] . '</div>
               </div>
             </li>';
            
    }
} else {
    echo "0 results";
}

$conn->close();

echo $data;

?>