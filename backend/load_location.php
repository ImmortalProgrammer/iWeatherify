<?php
	    // Connection Setup
	    include("connection.php");
	    include("security.php");
	    access_control();
	

	    $userid = $_GET["userid"];
	

	    // Use prepared statements to prevent SQL injection
	    $stmt = $conn->prepare("SELECT city, toggle FROM saved_location WHERE userid = ?");
	    $stmt->bind_param("s", $userid);
	    $stmt->execute();
	    $stmt->bind_result($city, $toggle);
	

	    if ($stmt->fetch()) {
	        echo json_encode(array("city" => $city, "toggle" => $toggle));
	    } else {
	        // Insert a new row with default values when no data is found for the user
	        $default_values = array("city" => "", "toggle" => 0); 
	        $insert_stmt = $conn->prepare("INSERT INTO saved_location (userid, city, toggle) VALUES (?, ?, ?)");
	        $insert_stmt->bind_param("ssi", $userid, $default_values["city"], $default_values["toggle"]);
	

	        if ($insert_stmt->execute()) {
	            echo json_encode($default_values);
	        } else {
	            echo json_encode(array("result" => "error", "message" => "Failed to insert default values for the specified user ID"));
	        }
	        $insert_stmt->close();
	    }
	

	    $stmt->close();
	?>

