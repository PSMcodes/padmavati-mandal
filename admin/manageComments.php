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
    // Get the username from the session and testimonial text from the POST request
    $user_id = $_SESSION['username'];  // Username from session (since the user is logged in)
    $testimonial_text = $_POST['comment'];  // Get the testimonial text from the form submission

    
    // Prepare the SQL statement to insert the testimonial
    $stmt = $conn->prepare("INSERT INTO testimonials (user_id, testimonial_text) VALUES (?, ?)");
        // Bind parameters (both are strings)
    $stmt->bind_param("ss", $user_id, $testimonial_text);
    
    // Execute the statement
    $stmt->execute();
    
    // Check if the insert was successful
    if ($stmt->affected_rows > 0) {
        echo "Testimonial added successfully!";
    } else {
        echo "Error adding testimonial.". htmlspecialchars($stmt->error);
    }
    
    // Close the statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Comments</title>
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
                <h2 class="text-center mt-5">Manage Comments</h2>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"  >
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <input type="text" class="form-control" id="comment" name="comment" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Add Comment</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Display Testimonials -->
    <div class="row mt-5">
    <div class="col-md-12">
        <?php
        // Fetch testimonials from the database
        $sql = "SELECT id, user_id, testimonial_text FROM testimonials ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>User ID</th>";
            echo "<th>Testimonial</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['testimonial_text']) . "</td>";
                echo "<td>";
                echo "<form method='POST' action='delete_testimonial.php'>";
                echo "<input type='hidden' name='testimonial_id' value='" . htmlspecialchars($row['id']) . "'>";
                echo "<button type='submit' class='btn btn-danger'>Delete</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<div class='text-center'><p>No testimonials found.</p></div>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</div>

</body>
</html>
