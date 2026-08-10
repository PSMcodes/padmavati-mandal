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

// Create the videos table if it does not exist yet
$conn->query("CREATE TABLE IF NOT EXISTS gallery_videos (
    id int(11) NOT NULL AUTO_INCREMENT,
    video_path varchar(255) NOT NULL,
    alt_text varchar(255) DEFAULT NULL,
    uploaded_at timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alt_text = $_POST['alt_text'];

    // Check if files were uploaded
    if (isset($_FILES['videos']) && is_array($_FILES['videos']['name'])) {
        $files = $_FILES['videos'];

        $max_size = 200 * 1024 * 1024; // 200 MB

        // Loop through each file
        for ($i = 0; $i < count($files['name']); $i++) {
            if ($files['error'][$i] == 0) {
                $video = [
                    'name' => $files['name'][$i],
                    'tmp_name' => $files['tmp_name'][$i],
                    'size' => $files['size'][$i],
                    'type' => $files['type'][$i],
                    'error' => $files['error'][$i]
                ];

                if ($video['size'] > $max_size) {
                    echo "<div class='alert alert-danger text-center'>File exceeds the 200 MB limit: " . htmlspecialchars($video['name']) . "</div>";
                    continue;
                }

                // Define the upload directory and file path
                $upload_dir = 'uploads/';
                $video_path = $upload_dir . basename($video['name']);

                // Allow only certain file formats
                $videoFileType = strtolower(pathinfo($video_path, PATHINFO_EXTENSION));
                $allowed_types = ['mp4', 'webm'];
                if (in_array($videoFileType, $allowed_types)) {
                    // Move the uploaded file to the target directory
                    if (move_uploaded_file($video['tmp_name'], $video_path)) {
                        // Prepare the SQL statement to insert the video details into the database
                        $stmt = $conn->prepare("INSERT INTO gallery_videos (video_path, alt_text) VALUES (?, ?)");
                        $stmt->bind_param("ss", $video_path, $alt_text);

                        // Execute the statement
                        if (!$stmt->execute()) {
                            echo "<div class='alert alert-danger text-center'>Failed to save video details to the database: " . $stmt->error . "
    </div>";
                        }

                        // Close the statement
                        $stmt->close();
                    } else {
                        echo "<div class='alert alert-danger text-center'>Failed to move the uploaded file.</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger text-center'>Only MP4 and WebM video files are allowed.</div>";
                }
            } else {
                echo "<div class='alert alert-danger text-center'>Error uploading file: " . $files['error'][$i] . "</div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger text-center'>No files uploaded or there was an error in the upload.</div>";
    }

    // Close the database connection
    $conn->close();
}


// Display the dashboard or protected content
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Videos</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <a href="dashboard.php" class="btn btn-primary"><i class="fa-solid fa-angle-left"></i></a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mt-5">Manage Videos</h2>
                <p class="text-center text-muted">MP4 and WebM files only. Maximum size 200 MB per video.</p>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="video">Choose Video</label>
                        <input type="file" class="form-control-file" id="video" name="videos[]" accept=".mp4,.webm,video/mp4,video/webm" required multiple>
                    </div>
                    <div class="form-group">
                        <label for="alt_text">Occassion</label>
                        <input type="text" class="form-control" id="alt_text" name="alt_text">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Upload</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Display Videos Grouped by Alt Text -->
    <div class="row mt-5">
        <?php
        // Include database configuration
        include 'dbconfig.php';

        // Fetch videos grouped by alt_text (occasion)
        $sql = "SELECT id, alt_text, video_path FROM gallery_videos ORDER BY uploaded_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $current_alt_text = '';
            while ($row = $result->fetch_assoc()) {
                if ($current_alt_text !== $row['alt_text']) {
                    if ($current_alt_text !== '') {
                        echo "</div></div>"; // Close previous group
                    }
                    $current_alt_text = $row['alt_text'];
                    echo "<div class='col-md-12'>";
                    echo "<h4 class='text-center mt-5'>Occasion: " . htmlspecialchars($current_alt_text) . "</h4>";
                    echo "<div class='row'>";
                }

                $id = $row['id'];
                $video = $row['video_path'];
                echo "<div class='col-md-6 mt-2'>";
                echo "<video src='" . htmlspecialchars($video) . "' class='img-fluid' controls preload='metadata'></video>";
                echo "<form method='POST' action='delete_video.php' class='mt-2'>";
                echo "<input type='hidden' name='video_id' value='" . htmlspecialchars($id) . "'>";
                echo "<input type='hidden' name='video_path' value='" . htmlspecialchars($video) . "'>";
                echo "<button type='submit' class='btn btn-danger btn-block'>Delete</button>";
                echo "</form>";
                echo "</div>";
            }
            echo "</div></div>"; // Close last group
        } else {
            echo "<div class='col-md-12 text-center'><p>No videos found.</p></div>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>

</body>

</html>
