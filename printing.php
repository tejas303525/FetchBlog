<?php

include 'connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};
?>


<!DOCTYPE html>
<html lang="en">

        <head>
            <meta charset="utf-8">
            <link rel="icon" href="img/Logo1.png" type="image/png">
            <title>Dora Infotech</title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <meta content="" name="keywords">
            <meta content="" name="description">

            <!-- Google Web Fonts -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">

            <!-- Icon Font Stylesheet -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

            <!-- Libraries Stylesheet -->
            <link rel="stylesheet" href="lib/animate/animate.min.css"/>
            <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
            <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


            <!-- Customized Bootstrap Stylesheet -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


            <!-- Template Stylesheet -->
            <link href="css/style.css" rel="stylesheet">
            <link href="css/printer.css" rel="stylesheet">

            <!--Customized-->
            <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
            <script src="lib/jquery/jquery.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>

            <style>
        .nav-bar {
            background: #fff;
            border-bottom: 1px solid #ddd;
        }
        .navbar-brand img {
            height: 50px;
        }
        .navbar-nav .nav-link {
            font-size: 0.95rem;
            color: #222;
            padding: 10px 15px;
        }
        .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
            color: #00AEDB;
        }
        /* WhatsApp floating icon — now on left */
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 20px;
            left: 20px;
            background-color: #25d366;
            color: #fff;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
            z-index: 999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.3s ease;
        }
        .whatsapp-float:hover {
            background-color: #128C7E;
            transform: scale(1.1);
        }
        .whatsapp-icon {
            color: white;
        }
        /* Navbar top right icons */
        .nav-contact-icons a {
            color: #00AEDB;
            font-size: 1.3rem;
            margin-left: 18px;
            transition: 0.3s;
        }
        .nav-contact-icons a:hover {
            color: #128C7E;
        }
        .btn-gradient {
        background: linear-gradient(45deg, #007bff, #00c6ff);
        border: none;
        color: #fff;
        padding: 8px 12px;
        border-radius: 4px;
        transition: 0.3s;
        text-decoration: none;
        display: inline-block;
        }

        .btn-gradient:hover {
        background: linear-gradient(45deg, #0056b3, #0088cc);
        color: #fff;
        }

    </style>
        </head>

    <body>


        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Topbar Start -->
        <div class="container-fluid topbar px-0 px-lg-4 bg-light py-2 d-none d-lg-block">
            <div class="container">
                <div class="row gx-0 align-items-center">
                    <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                        <div class="d-flex flex-wrap">
                            <div class="border-end border-primary pe-3">
                                <a href="https://maps.app.goo.gl/pXz5iFKWCu8dnTVd9" class="text-muted small"><i class="fas fa-map-marker-alt text-primary me-2"></i>Burdubai – Office-205,Mostafawi Business Centre, Near Al Fahidi Metro – Dubai – United Arab Emirates</a>
                            </div>
                            <div class="ps-3">
                                <a href="mailto:info@dorainfotech.com" class="text-muted small"><i class="fas fa-envelope text-primary me-2"></i>info@dorainfotech.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end">
                        <div class="d-flex justify-content-end">
                            <div class="d-flex border-end border-primary pe-3">
                                <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-instagram"></i></a>
                                <a class="btn p-0 text-primary me-0" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

                <!-- Navbar Start -->
                <div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <!-- Brand Logos Side by Side -->
                            <a href="#" class="navbar-brand p-0 d-flex align-items-center">
                                <img src="img/dorainfotech2.jpg" alt="Dora Infotech Logo 1" style="margin-right: 2px; margin-bottom: 5px;">
                                <img src="img/dorainfotech.jpg" alt="Dora Infotech Logo 2">
                            </a>

                            <!-- Toggler for Mobile -->
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                                <span class="fa fa-bars"></span>
                            </button>

                            <!-- Navbar Links -->
                            <div class="collapse navbar-collapse" id="navbarCollapse">
                                <div class="navbar-nav mx-0 mx-lg-auto">
                                    <a href="index.html" class="nav-item nav-link">Home</a>
                                    <a href="#" class="nav-item nav-link active">Printer Rental</a>
                                    <a href="#" class="nav-item nav-link">IT Setup</a>
                                    <a href="#" class="nav-item nav-link">Telephone System</a>
                                    <a href="#" class="nav-item nav-link">Structured Cabling</a>
                                    <a href="#" class="nav-item nav-link">VPN Solution</a>
                                    <a href="#" class="nav-item nav-link">Contact</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Navbar End -->

                <!-- WhatsApp Live Chat Icon -->
                <a href="https://wa.me/919876543210" target="_blank" class="whatsapp-float">
                    <i class="fab fa-whatsapp whatsapp-icon"></i>
                </a>

                <!-- Modal Search Start -->
                <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content rounded-0">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex align-items-center bg-primary">
                                <div class="input-group w-75 mx-auto d-flex">
                                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                                    <span id="search-icon-1" class="btn bg-light border nput-group-text p-3"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Search End -->


                <!-- Banner Slider Start -->
                <div class="container-fluid px-0">
                    <div class="owl-carousel header-carousel">
                        <!-- Slide 1 -->
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/prin.jpg" style="height: 350px; object-fit: cover;" alt="Printer Rental Services">
                            <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                                <h1 class="display-3 fw-bold">Premium Printer Rentals</h1>
                                <p class="fs-5">High-performance printers, delivered and maintained hassle-free</p>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/printing3.jpg" style="height: 350px; object-fit: cover;" alt="IT Infrastructure">
                            <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                                <h1 class="display-3 fw-bold">Complete IT Infrastructure</h1>
                                <p class="fs-5">From structured cabling to enterprise cloud migrations</p>
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/printing4.png" style="height: 350px; object-fit: cover;" alt="Managed Print Services">
                            <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                                <h1 class="display-3 fw-bold">Managed Print Solutions</h1>
                                <p class="fs-5">Seamless printing, support & maintenance — so you can focus on business</p>
                            </div>
                        </div>

                        <!-- Slide 4 -->
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/printing1.jpg" style="height: 350px; object-fit: cover;" alt="Cyber Security Services">
                            <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                                <h1 class="display-3 fw-bold">Advanced Cyber Security</h1>
                                <p class="fs-5">Shield your business with cutting-edge threat protection solutions</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Banner Slider End -->

                <!-- Owl Carousel Initialization -->
                <script>
                    $(document).ready(function(){
                        $(".header-carousel").owlCarousel({
                            items: 1,
                            loop: true,
                            autoplay: true,
                            autoplayTimeout: 4000,
                            smartSpeed: 900,
                            dots: true,
                            nav: false
                        });
                    });
                </script>
                <!--Slide End-->
                <!-- Section Start-->
   <!-- Section Start-->
<section class="products container">
    <h1>Latest Products</h1>

    <!-- Filter bar -->
    <form method="GET" class="filter-bar mb-4 d-flex flex-wrap align-items-center gap-2">
        <input type="text" name="search" class="form-control" placeholder="Search products..." 
            value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" style="max-width:250px;">

        <select name="category" class="form-select" style="max-width:200px;">
            <option value="">All Categories</option>
            <option value="laptop" <?= (isset($_GET['category']) && $_GET['category'] == 'laptop') ? 'selected' : '' ?>>Laptops</option>
            <option value="printer" <?= (isset($_GET['category']) && $_GET['category'] == 'printer') ? 'selected' : '' ?>>Printers</option>
            <option value="accessory" <?= (isset($_GET['category']) && $_GET['category'] == 'accessory') ? 'selected' : '' ?>>Accessories</option>
        </select>

        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <div class="row">
    <?php
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    $category = isset($_GET['category']) ? trim($_GET['category']) : '';

    $query = "SELECT * FROM `products` WHERE 1";
    $params = [];

    if (!empty($search)) {
        $query .= " AND name LIKE ?";
        $params[] = "%$search%";
    }

    if (!empty($category)) {
        $query .= " AND name LIKE ?";
        $params[] = "%$category%";
    }

    $select_products = $conn->prepare($query);
    $select_products->execute($params);

    if($select_products->rowCount() > 0){
        while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
    ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <form action="" method="post" class="product-card border p-2 rounded shadow-sm">
                <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
                <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
                <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">

                <div class="product-img position-relative">
                    <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="<?= $fetch_product['name']; ?>" class="img-fluid rounded">
                    <div class="action-icons position-absolute top-0 end-0 m-2">
                        <button type="submit" name="add_to_wishlist" class="btn btn-sm btn-light"><i class="fas fa-heart"></i></button>
                        <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="btn btn-sm btn-light"><i class="fas fa-eye"></i></a>
                    </div>
                </div>

                <div class="product-details mt-3 text-center">
                    <h5 class="mb-2"><?= $fetch_product['name']; ?></h5>
                    
                    <!-- Star Rating -->
                    <div class="mb-2">
                        <?php
                        $rating = rand(4, 5); // random 4 or 5 stars for now
                        for($i=1; $i<=5; $i++){
                            if($i <= $rating){
                                echo '<i class="fas fa-star text-warning"></i> ';
                            }else{
                                echo '<i class="far fa-star text-warning"></i> ';
                            }
                        }
                        ?>
                    </div>

                    <a href="./PMcontact/contact.php?product=<?= urlencode($fetch_product['name']); ?>" class="btn btn-gradient w-100">Enquire</a>
                </div>
            </form>
        </div>
    <?php
        }
    } else {
        echo '<p class="empty">No products found!</p>';
    }
    ?>
    </div>
</section>
<!-- Section End-->

<!--Product End-->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

</html>