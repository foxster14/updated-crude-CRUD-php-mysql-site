<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Sensor Record</title>
</head>

<body>
	<h2>Add a New Sensor Record to the Sensors Inventory</h2>
	<br><br>
	<?php
		echo "<h3>PHP Code Generates This:</h3>";
		
		//import location of mysql database, database credentials
		//and which database to use, i.e. Employees
		include 'credentials.php';
	
		//this is the php object oriented style of creating a mysql connection
		$conn = new mysqli($servername, $username, $password, $dbname);  
	
		//check for connection success
		if ($conn->connect_error) {
			die("MySQL Connection Failed: " . $conn->connect_error);
		}
		echo "MySQL Connection Succeeded<br><br>";
		
		//pull the attribute that was passed with the html form GET request and put into a local variable.
		$sensor_no = $_GET["sensor_no"];
		$sensor_type = $_GET["sensor_type"];
		$sensor_status = $_GET["sensor_status"];
		$emp_no = $_GET["emp_no"];
		echo "Adding record for Sensor Number: " . $sensor_no . " and Employee Number: " . $emp_no;
	
		echo "<br><br>";
		
		//create the SQL insert statement, notice the funky string concat at the end to variablize the query
		//based on using the GET attribute
		//this statement needs to be variablized to put in the data passed from the form
		//right now it is hardcoded.
		/*$sql = "BEGIN; 
				INSERT INTO sensors (sensor_no, sensor_type, sensor_status) 
				VALUES ('".$sensor_no."', '".$sensor_type."', '".$sensor_status."');
				INSERT INTO emp_sensor (emp_no, sensor_no) 
				VALUES ('".$emp_no."', '".$sensor_no."'); 
				COMMIT;";*/
		
		$sql = "INSERT INTO sensors (sensor_no, sensor_type, sensor_status) 
				VALUES ('".$sensor_no."', '".$sensor_type."', '".$sensor_status."')";

		$sql = "INSERT INTO emp_sensor (emp_no, sensor_no) 
				VALUES ('".$emp_no."', '".$sensor_no."')";
	
	
		if ($conn->query($sql) === TRUE){
			
			echo "New Sensor Record Created Successfully";
			
		} else {
		
			echo "Error: " . $sql . "<br>" . $conn->error;
			
		}
		
		//always close the DB connections, don't leave 'em hanging
		$conn->close();
		
	?>
    <br>
    <hr>
    <br>
    <p>Click the link below to return to the homepage</p>
    <a href="index.html" title="Home" target="_parent">Home</a>
</body>
</html>
