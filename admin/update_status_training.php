<?php
include 'db.php';

if (isset($_GET['id']) && isset($_GET['status'])) {
    $booking_id = intval($_GET['id']);
    $status = $_GET['status'];

    // Basic validation
    if ($status == 'Approved' || $status == 'Rejected') {
        $stmt = $conn->prepare("UPDATE training_sessions  SET status = ? WHERE training_id  = ?");
        $stmt->bind_param("si", $status, $booking_id);
        if ($stmt->execute()) {
            header("Location: view_training_session.php?message=Status updated successfully");
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Invalid status value.";
    }
} else {
    echo "Missing parameters.";
}
?>
