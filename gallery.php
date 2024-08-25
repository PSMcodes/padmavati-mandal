<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Padmavati mitra Mandal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap"
        rel="stylesheet">

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
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="index.html" class="navbar-brand">
                    <img class="img-fluid" src="img/logo2.jpg" alt="Logo" style="margin-top: -50px;">
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="index.html#about" class="nav-item nav-link">About</a>
                        <a href="index.html#social" class="nav-item nav-link">Social Activity</a>
                        <a href="gallery.php" class="nav-item nav-link">Gallery</a>
                        <a href="index.html#donation" class="nav-item nav-link">Donation</a>
                        <a href="index.html#contact" class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Gallery</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Gallery</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl contact py-5">
        <div class="container-xxl py-5">
            <div class="container">
                <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s"
                    style="max-width: 500px;">
                    <p class="fs-5 fw-medium fst-italic text-primary">Gallery</p>
                    <h1 class="display-6">आमच्या कार्याची झलक: गॅलरी</h1>
                </div>
                <!-- Gallery -->
                <div class="row mt-5">
                    <?php
                    // Include database configuration
                    include 'admin/dbconfig.php';

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
                            echo "<img src='./admin/" . htmlspecialchars($image) . "' class='img-fluid' alt='" . htmlspecialchars($current_alt_text) . "'>";
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
                <!-- Gallery -->
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary mb-4">Our Office</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>Padmavati Nagar
                        Bolinj, Virar West, Virar, Maharashtra 401303</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary me-3"></i>+91 98202 91555</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary me-3"></i>+91 80804 95564</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>info@example.com</p>
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Donation</a>
                    <a class="btn btn-link" href="">Gallery</a>
                    <a class="btn btn-link" href="">Social Activity</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30097.547707274894!2d72.77082187491266!3d19.44722395509248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7aa328eec6e5f%3A0x39ed7280483bc49e!2sPadmavati%20Nagar%2C%20Bolinj%2C%20Virar%20West%2C%20Virar%2C%20Maharashtra%20401303!5e0!3m2!1sen!2sin!4v1724516878823!5m2!1sen!2sin"
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        class="map"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="fw-medium" href="#">Padmavati Mitra Mandal</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Designed By <a class="fw-medium" href="https://psmcodes.com">PSMcodes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>