<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: index.html");
    exit();
}

include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image_id = $_POST['image_id'];
    $image_path = $_POST['image_path'];

    // Delete the image file from the server
    if (file_exists($image_path)) {
        if (unlink($image_path)) {
            // Delete the image record from the database
            $stmt = $conn->prepare("DELETE FROM gallery_images WHERE id = ?");
            $stmt->bind_param("i", $image_id);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success text-center'>Image deleted successfully!</div>";
            } else {
                echo "<div class='alert alert-danger text-center'>Failed to delete image from the database: " . $stmt->error . "</div>";
            }

            $stmt->close();
        } else {
            echo "<div class='alert alert-danger text-center'>Failed to delete image file from the server.</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Image file does not exist.</div>";
    }

    $conn->close();
}

// Redirect back to the upload page
header("Location: manageUploads.php");
exit();
?>