<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Employee</title>
</head>

<body>
	<h2>Update an Employee Record</h2>
	<hr>
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

        $emp_attr = $_GET["drop_down"];
        $new_value = $_GET["new_value"];
        $emp_no = $_GET["emp_no"];

        // display what we are updating to the user 
        echo "Updating: " . $emp_attr . " to " . $new_value;

        $sql = "UPDATE employees SET ".$emp_attr." = '".$new_value."' WHERE ".$emp_no." = '".$emp_no."'";
        //UPDATE employees SET hire_date = "1999-05-30" WHERE emp_no = 500000
		echo "<br><br>";

        //run the Update
        if ($conn->query($sql) == TRUE){
			//print updated record
			
			echo "Employee Number: '".$emp_no."'  Updated Successfully<br>";
			
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		echo "<hr><br>
		<p>Click the link below to return to the homepage</p>
		<a href='index.html' title='Home' target='_parent'>Home</a>";

        $conn->close();
	?>
</body>
</html>        