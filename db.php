 <?php
 /*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

// Create connection
function create_connection(){
	$servername = "localhost";
	$username = "jony";
	$password = "password";
	$dbname = "imageProcessing";

	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error. "<br>");
	}
	else{
		echo "connection success" . "<br>";
		return $conn;
	}
}

function create_table(){
	$conn = create_connection();

	// sql to create table
	$sql = "CREATE TABLE Session (
	id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	hash VARCHAR(65) NOT NULL,
	num_of_service INT(5) UNSIGNED NOT NULL,
	last_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP )";


	if ($conn->query($sql) === TRUE) {
	    echo "Table Session created successfully". "<br>";
	} else {
	    echo "Error Session table: " . $conn->error. "<br>";
	}

	$conn->close();
}
//create_table();

function create_session(){
	$conn = create_connection();

	$hash = hash('sha256', rand());
	$sql = "INSERT INTO Session (hash, num_of_service)
	VALUES ('$hash', 1)";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully". "<br>";

	    // get the id
		$last_id = $conn->insert_id;
		return array($last_id, $hash);
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error. "<br>";
	}

	$conn->close();
}

//$id_hash = create_session();
//echo $id_hash[1];
//echo $id;

function verify_user($conn, $id, $hash){
	$sql = "SELECT id from Session
	WHERE id=$id and hash='$hash'";

	$result = $conn->query($sql);

	return ($result->num_rows > 0);
}

function add_service($id, $hash){
	$conn = create_connection();

	if(verify_user($conn, $id, $hash)){
		$sql = "UPDATE Session 
	  SET num_of_service = num_of_service + 1 
	  WHERE id = $id";

		if ($conn->query($sql) === TRUE) {
		    echo "service added in DB". "<br>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error. "<br>";
		}
	}
	else{
		echo "You are not Verified";
	}

	$conn->close();
}

//add_service(2, '48dd2b73c3d11441989db7c05d21e9b8bad65b2829f4f9de58741a111faf357c');

function get_outdated_session(){
	$conn = create_connection();

	$sql = "SELECT id FROM Session 
		WHERE last_timestamp + INTERVAL 10 MINUTE < CURTIME() ";

	$result = $conn->query($sql);
	//print_r($result);

	if ($result->num_rows > 0) {
	    // output data of each row
	    $ids = [];
	    while($row = $result->fetch_assoc()) {
	        //echo "id: " . $row["id"]. "<br>";
	        array_push($ids, $row["id"]);
	    }
	    return $ids;
	} else {
	    echo "0 results". "<br>";
	}

	$conn->close();
}

function remove_sesson_by_ids($ids){
	if(sizeof($ids)){
		$conn = create_connection();

		$sql = "DELETE FROM Session 
				WHERE id IN (" . implode(',', $ids) . ")";
		//echo $sql;

		if ($conn->query($sql) === TRUE) {
			echo "Sessions Removed". "<br>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error. "<br>";
		}

		$conn->close();
	}
	else{
		echo "No Sessions to Delete". "<br>";
	}
	
}

//$ids = get_outdated_session();
//print_r($ids);

?> 