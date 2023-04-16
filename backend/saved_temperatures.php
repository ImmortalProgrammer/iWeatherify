<?php
    // Connection Setup
    include("connection.php");
    include("security.php");
    access_control();

    // Get the input data
    $input = json_decode(file_get_contents("php://input"), true);
    $userid = $input["userid"];
    $hot = $input["hot"];
    $warm = $input["warm"];
    $ideal = $input["ideal"];
    $cold = $input["cold"];
    $chilly = $input["chilly"];
    $freezing = $input["freezing"];

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
?>