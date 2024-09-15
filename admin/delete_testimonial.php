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
            $testimonial_id = $_POST['testimonial_id'];
            $stmt = $conn->prepare("DELETE FROM testimonials WHERE id = ?");
            $stmt->bind_param("i", $image_id);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success text-center'>Image deleted successfully!</div>";
            } else {
                echo "<div class='alert alert-danger text-center'>Failed to delete image from the database: " . $stmt->error . "</div>";
            }

            

// Redirect back to the upload page
header("Location: manageUploads.php");
exit();
?>