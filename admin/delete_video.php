<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: index.php");
    exit();
}

include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $video_id = $_POST['video_id'];
    $video_path = $_POST['video_path'];

    // Delete the video file from the server
    if (file_exists($video_path)) {
        if (unlink($video_path)) {
            // Delete the video record from the database
            $stmt = $conn->prepare("DELETE FROM gallery_videos WHERE id = ?");
            $stmt->bind_param("i", $video_id);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success text-center'>Video deleted successfully!</div>";
            } else {
                echo "<div class='alert alert-danger text-center'>Failed to delete video from the database: " . $stmt->error . "</div>";
            }

            $stmt->close();
        } else {
            echo "<div class='alert alert-danger text-center'>Failed to delete video file from the server.</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Video file does not exist.</div>";
    }

    $conn->close();
}

// Redirect back to the videos page
header("Location: manageVideos.php");
exit();
?>
