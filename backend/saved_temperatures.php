<?php
    // Connection Setup
    header("Content-Type: application/json; charset=UTF-8");
    // header("Access-Control-Allow-Origin: http://localhost:8080");
    header("Access-Control-Allow-Origin: https://www-student.cse.buffalo.edu");
    header("Access-Control-Allow-Methods: POST, GET");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Allow-Credentials: true");
    $servername = "oceanus";
    $username = "jpan26";
    $password = "50314999";
    $dbname = "cse442_2023_spring_team_a_db";

    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "cse442";

    // Get the input data
    $input = json_decode(file_get_contents("php://input"), true);
    $userid = $input["userid"];
    $hot = $input["hot"];
    $warm = $input["warm"];
    $ideal = $input["ideal"];
    $cold = $input["cold"];
    $chilly = $input["chilly"];
    $freezing = $input["freezing"];

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the row exists
    $check_query = "SELECT COUNT(*) as count FROM saved_temperatures WHERE userid = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("s", $userid);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();
    $row_exists = false;

    if ($check_result->num_rows > 0) {
        $row = $check_result->fetch_assoc();
        if ($row["count"] > 0) {
            $row_exists = true;
        }
    }

    $check_stmt->close();

    // If row exists, update, otherwise insert
    if ($row_exists) {
        $query = "UPDATE saved_temperatures SET hot = ?, warm = ?, ideal = ?, cold = ?, chilly = ?, freezing = ? WHERE userid = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iiiiiis", $hot, $warm, $ideal, $cold, $chilly, $freezing, $userid);
    } else {
        $query = "INSERT INTO saved_temperatures (userid, hot, warm, ideal, cold, chilly, freezing) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("siiiiii", $userid, $hot, $warm, $ideal, $cold, $chilly, $freezing);
    }

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode(array("result" => "success"));
        } else {
            echo json_encode(array("result" => "no_changes", "message" => "No changes were made"));
        }
    } else {
        echo json_encode(array("result" => "error", "message" => $stmt->error));
    }

    $stmt->close();
    $conn->close();
?>