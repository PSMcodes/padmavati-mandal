<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tea House - Tea Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    width: 80%;
    margin: auto;
    overflow: hidden;
}

header {
    background: #333;
    color: #fff;
    padding: 1rem 0;
    text-align: center;
}

nav {
    background: #444;
    color: #fff;
    padding: 1rem 0;
}

nav ul {
    list-style: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
}

main {
    padding: 2rem;
}

h2 {
    border-bottom: 2px solid #333;
    padding-bottom: 0.5rem;
}

.upload-form {
    margin-bottom: 2rem;
}

.upload-form input[type="file"] {
    padding: 0.5rem;
}

.upload-form button {
    background: #28a745;
    color: #fff;
    border: none;
    padding: 0.5rem 1rem;
    cursor: pointer;
}

.upload-form button:hover {
    background: #218838;
}

.gallery-images {
    display: flex;
    flex-wrap: wrap;
}

.gallery-item {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin: 1rem;
    padding: 1rem;
    text-align: center;
    position: relative;
}

.gallery-item img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
}

.delete-btn, .approve-btn {
    display: inline-block;
    margin-top: 0.5rem;
    padding: 0.5rem 1rem;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}

.delete-btn {
    background: #dc3545;
}

.delete-btn:hover {
    background: #c82333;
}

.approve-btn {
    background: #007bff;
}

.approve-btn:hover {
    background: #0056b3;
}

.testimonial-item {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin: 1rem 0;
    padding: 1rem;
}

.testimonial-item p {
    margin: 0;
}

    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1>Admin Panel</h1>
        </header>

        <nav>
            <ul>
                <li><a href="#gallery">Manage Gallery</a></li>
                <li><a href="#testimonials">Manage Testimonials</a></li>
            </ul>
        </nav>

        <main>
            <section id="gallery">
                <h2>Manage Gallery</h2>
                <form action="upload_image.php" method="post" enctype="multipart/form-data" class="upload-form">
                    <input type="file" name="image" required>
                    <button type="submit">Upload Image</button>
                </form>

                <h3>Gallery Images</h3>
                <div class="gallery-images">
                    <?php
                    include 'db_connection.php'; // Make sure to include your DB connection file

                    $result = mysqli_query($conn, "SELECT * FROM gallery_images");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="gallery-item">';
                        echo '<img src="' . $row['image_path'] . '" alt="Gallery Image">';
                        echo '<a href="delete_image.php?id=' . $row['id'] . '" class="delete-btn">Delete</a>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </section>

            <section id="testimonials">
                <h2>Manage Testimonials</h2>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM testimonials WHERE approved = 0");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="testimonial-item">';
                    echo '<p>' . htmlspecialchars($row['testimonial']) . '</p>';
                    echo '<a href="approve_testimonial.php?id=' . $row['id'] . '" class="approve-btn">Approve</a>';
                    echo '<a href="delete_testimonial.php?id=' . $row['id'] . '" class="delete-btn">Delete</a>';
                    echo '</div>';
                }
                ?>
            </section>
        </main>
    </div>
</body>
<script>
    // Add any interactive features you want here, such as confirmation dialogs for deletes
document.addEventListener('DOMContentLoaded', () => {
    const deleteLinks = document.querySelectorAll('.delete-btn');
    
    deleteLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            if (!confirm('Are you sure you want to delete this item?')) {
                e.preventDefault();
            }
        });
    });
});

</script>
</html>