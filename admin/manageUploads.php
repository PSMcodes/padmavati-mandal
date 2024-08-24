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
    $alt_text = $_POST['alt_text'];

    // Handle the image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image'];

        // Define the upload directory and file path
        $upload_dir = 'uploads/';
        $image_path = $upload_dir . basename($image['name']);

        // Check if the file is an actual image
        $imageFileType = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));
        $check = getimagesize($image['tmp_name']);
        if ($check !== false) {
            // Allow only certain file formats
            $allowed_types = array('jpg', 'jpeg', 'png', 'gif','webp',);
            if (in_array($imageFileType, $allowed_types)) {
                // Move the uploaded file to the target directory
                if (move_uploaded_file($image['tmp_name'], $image_path)) {
                    // Prepare the SQL statement to insert the image details into the database
                    $stmt = $conn->prepare("INSERT INTO gallery_images (image_path, alt_text) VALUES (?, ?)");
                    $stmt->bind_param("ss", $image_path, $alt_text);

                    // Execute the statement
                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success text-center'>Image uploaded successfully!</div>";
                    } else {
                        echo "<div class='alert alert-danger text-center'>Failed to save image details to the database: " . $stmt->error . "</div>";
                    }

                    // Close the statement
                    $stmt->close();
                } else {
                    echo "<div class='alert alert-danger text-center'>Failed to move the uploaded file.</div>";
                }
            } else {
                echo "<div class='alert alert-danger text-center'>Only JPG, JPEG, PNG, and GIF files are allowed.</div>";
            }
        } else {
            echo "<div class='alert alert-danger text-center'>File is not an image.</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-center'>No file uploaded or there was an error in the upload.</div>";
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
    <title>Manage Uploads</title>
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
            <div class="col-md-6">
                <h2 class="text-center mt-5">Manage Uploads</h2>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="image">Choose Image</label>
                        <input type="file" class="form-control-file" id="image" name="image" required multiple>
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

    <div clas<!-- Display Images Grouped by Alt Text -->
        <div class="row mt-5">
            <?php
    // Include database configuration
    include 'dbconfig.php';

    // Fetch images grouped by alt_text (occasion)
    $sql = "SELECT id, alt_text, image_path FROM gallery_images ORDER BY alt_text";
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
            $image = $row['image_path'];
            echo "<div class='col-md-3 mt-2'>";
            echo "<img src='" . htmlspecialchars($image) . "' class='img-fluid' alt='" . htmlspecialchars($current_alt_text) . "'>";
            echo "<form method='POST' action='delete_image.php' class='mt-2'>";
            echo "<input type='hidden' name='image_id' value='" . htmlspecialchars($id) . "'>";
            echo "<input type='hidden' name='image_path' value='" . htmlspecialchars($image) . "'>";
            echo "<button type='submit' class='btn btn-danger btn-block'>Delete</button>";
            echo "</form>";
            echo "</div>";
        }
        echo "</div></div>"; // Close last group
    } else {
        echo "<div class='col-md-12 text-center'><p>No images found.</p></div>";
    }

    // Close the database connection
    $conn->close();
    ?>
        </div>

</body>

</html>