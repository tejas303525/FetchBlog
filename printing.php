<?php

include 'connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = '';
}
;
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
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap"
    rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link rel="stylesheet" href="lib/animate/animate.min.css" />
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

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
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
      box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
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
  <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  <!-- Spinner End -->

  <!-- Topbar Start -->
  <div class="container-fluid topbar px-0 px-lg-4 bg-light py-2 d-none d-lg-block">
    <div class="container">
      <div class="row gx-0 align-items-center">
        <!-- Left Side: Address, Email, Phone -->
        <div class="col-lg-8 text-center text-lg-start mb-lg-0">
          <div class="d-flex flex-nowrap align-items-center">
            <div class="border-end border-primary pe-3">
              <a href="https://maps.app.goo.gl/pXz5iFKWCu8dnTVd9" class="text-muted small">
                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                Burdubai – Office-205, Mostafawi Business Centre – Dubai.
              </a>
            </div>
            <div class="border-end border-primary px-3">
              <a href="mailto:info@dorainfotech.com" class="text-muted small">
                <i class="fas fa-envelope text-primary me-2"></i>
                printer@dorainfotech.com
              </a>
            </div>
            <div class="ps-3">
              <a href="tel:+971559347128" class="text-muted small">
                <i class="fas fa-phone-alt text-primary me-2"></i>
                +971 559347128
              </a>
            </div>
          </div>
        </div>

        <!-- Right Side: Social Links -->
        <div class="col-lg-4 text-center text-lg-end">
          <div class="d-flex justify-content-end">
            <div class="d-flex border-end border-primary pe-3">
              <a class="btn p-0 text-primary me-3"
                href="https://www.facebook.com/people/Dora-Information-Technology-Dubai/61572403985242/#"><i
                  class="fab fa-facebook-f"></i></a>
              <a class="btn p-0 text-primary me-3" href="https://www.instagram.com/dorainfotechllc/"><i
                  class="fab fa-instagram"></i></a>
              <a class="btn p-0 text-primary" href="https://www.linkedin.com/company/dora-infotech"><i
                  class="fab fa-linkedin-in"></i></a>
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
                    <img src="img/verynewlogo.png" alt="Dora Infotech Logo 1" style="height: 100px;">
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
            <a href="itofficesetup.html" class="nav-item nav-link">IT Setup</a>
            <a href="telephonesystem.html" class="nav-item nav-link">Telephone System</a>
            <a href="structurecabling.html" class="nav-item nav-link">Structured Cabling</a>
            <a href="vpnsolution.html" class="nav-item nav-link">VPN Solution</a>
            <a href="contact.php" class="nav-item nav-link">Contact</a>
          </div>

          <!-- Search & CTA Button -->
          <div class="nav-btn px-3">
            <!-- Modal Trigger Button -->
            <button type="button" class="btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0"
              data-bs-toggle="modal" data-bs-target="#videoModal">
              Demo Video
            </button>
          </div>
        </div>
    </div>
    </nav>
  </div>
  </div>
  <!-- Navbar End -->

  <!-- Video Modal -->
  <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="videoModalLabel">Demo Video</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
            onclick="stopVideo()"></button>
        </div>

        <div class="modal-body">
          <div class="ratio ratio-16x9">
            <video id="demoVideo" controls>
              <source src="videos/printingvideo.mp4" type="video/mp4">
              Your browser does not support the video tag.
            </video>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Bootstrap JS Bundle (with Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Script to stop video when modal closes -->
  <script>
    function stopVideo() {
      var video = document.getElementById("demoVideo");
      video.pause();
      video.currentTime = 0;
    }
  </script>

<!-- WhatsApp Live Chat Icon -->
<a href="https://wa.me/971559341285?" target="_blank" class="whatsapp-float">
  <i class="fab fa-whatsapp whatsapp-icon"></i>
</a>

<!-- Popup Modal -->
<div class="whatsapp-popup" id="whatsappPopup">
  <i class="fab fa-whatsapp popup-icon"></i>
  <p>Hi 👋, how can I help you?</p>
</div>

<style>

</style>

<script>
// Show popup after 3 seconds
setTimeout(function() {
  document.getElementById("whatsappPopup").style.display = "flex";
}, 3000);

// Hide popup when user clicks anywhere
document.addEventListener("click", function() {
  document.getElementById("whatsappPopup").style.display = "none";
});
</script>

</script>


  <!-- Banner Slider Start -->
  <div class="container-fluid px-0">
    <div class="owl-carousel header-carousel">

      <!-- Slide -->
      <div class="position-relative" style=" overflow: hidden;">
        <img class="img-fluid w-100 h-90" src="img/printing3.jpeg" style="object-fit: cover;"
          alt="Printer Rental Services">
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white"></div>
      </div>

      <div class="position-relative" style=" overflow: hidden;">
        <img class="img-fluid w-100 h-90" src="img/printing2.jpeg" style="object-fit: cover;"
          alt="Office Printer Solutions">
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white"></div>
      </div>

      <div class="position-relative" style="overflow: hidden;">
        <img class="img-fluid w-100 h-90" src="img/printing1.png" style="object-fit: cover;"
          alt="Managed Print Services">
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white"></div>
      </div>

      <div class="position-relative" style=" overflow: hidden;">
        <img class="img-fluid w-100 h-90" src="img/printing4.jpeg" style="object-fit: cover;"
          alt="Printer Leasing Dubai">
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white"></div>
      </div>

    </div>
  </div>
  <!-- Banner Slider End -->

  <section class="container py-5">
    <h2 class="mb-4 text-center">Printer Rental Products</h2>

    <!-- Filter Bar -->
    <form method="GET" class="d-flex flex-wrap mb-4 gap-2 align-items-center">
      <input type="text" name="search" class="form-control" placeholder="Search printers..."
        value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" style="max-width:250px;">

      <select name="category" class="form-select" style="max-width:200px;">
        <option value="">All Categories</option>
        <option value="Printer" <?= (isset($_GET['category']) && $_GET['category'] == 'Printer') ? 'selected' : '' ?>>
          Printers</option>
        <option value="Rental" <?= (isset($_GET['category']) && $_GET['category'] == 'Rental') ? 'selected' : '' ?>>Rental
        </option>
      </select>

      <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <!-- Products Grid -->
    <div class="row">
      <?php
      $search = isset($_GET['search']) ? trim($_GET['search']) : '';
      $category = isset($_GET['category']) ? trim($_GET['category']) : '';

      $query = "SELECT * FROM products WHERE 1";
      $params = [];

      if (!empty($search)) {
        $query .= " AND name LIKE ?";
        $params[] = "%$search%";
      }

      if (!empty($category)) {
        $query .= " AND category = ?";
        $params[] = $category;
      }

      $stmt = $conn->prepare($query);
      $stmt->execute($params);

      if ($stmt->rowCount() > 0) {
        while ($product = $stmt->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
              <img src="uploaded_img/<?= $product['image_01']; ?>" class="card-img-top" alt="<?= $product['name']; ?>"
                style="height:220px; object-fit:cover;">
              <div class="card-body text-center">
                <h5 class="card-title mb-2"><?= $product['name']; ?></h5>

                <!-- Star Ratings -->
                <div class="mb-3">
                  <?php
                  $rating = rand(4, 5);
                  for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $rating) {
                      echo '<i class="fas fa-star text-warning"></i> ';
                    } else {
                      echo '<i class="far fa-star text-warning"></i> ';
                    }
                  }
                  ?>
                </div>

                <button class="btn btn-outline-primary btn-sm w-100" data-bs-toggle="modal"
                  data-bs-target="#productModal<?= $product['id']; ?>">Quick View</button>
              </div>
            </div>
          </div>

          <!-- Quick View Modal -->
          <div class="modal fade" id="productModal<?= $product['id']; ?>" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content border-0 rounded-3">
                <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row g-4">
                  <div class="col-md-5 text-center">
                    <!-- Main Image -->
                    <img id="mainImage<?= $product['id']; ?>" src="uploaded_img/<?= $product['image_01']; ?>"
                      alt="<?= $product['name']; ?>" class="img-fluid rounded mb-3"
                      style="max-height:300px; object-fit:contain;">

                    <!-- Thumbnails -->
                    <div class="d-flex justify-content-center gap-2">
                      <img src="uploaded_img/<?= $product['image_01']; ?>" class="img-thumbnail"
                        style="width:60px; cursor:pointer;"
                        onclick="changeMainImage('<?= $product['id']; ?>','uploaded_img/<?= $product['image_01']; ?>')">
                      <img src="uploaded_img/<?= $product['image_02']; ?>" class="img-thumbnail"
                        style="width:60px; cursor:pointer;"
                        onclick="changeMainImage('<?= $product['id']; ?>','uploaded_img/<?= $product['image_02']; ?>')">
                      <img src="uploaded_img/<?= $product['image_03']; ?>" class="img-thumbnail"
                        style="width:60px; cursor:pointer;"
                        onclick="changeMainImage('<?= $product['id']; ?>','uploaded_img/<?= $product['image_03']; ?>')">
                    </div>
                  </div>

                  <div class="col-md-7">
                    <h6 class="text-muted mb-2"> <?= $product['name']; ?></h6>
                    <p class="small mb-3"><?= nl2br($product['details']); ?></p>

                    <div class="mb-3">
                      <?php
                      for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $rating) {
                          echo '<i class="fas fa-star text-warning"></i> ';
                        } else {
                          echo '<i class="far fa-star text-warning"></i> ';
                        }
                      }
                      ?>
                    </div>

                    <a href="./PMcontact/contact.php?product=<?= urlencode($product['name']); ?>"
                      class="btn btn-primary">Enquire Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php
        }
      } else {
        echo '<p class="text-center">No products found!</p>';
      }
      ?>
    </div>
  </section>

  <!-- JS to change Main Image in Modal -->
  <script>
    function changeMainImage(id, src) {
      document.getElementById('mainImage' + id).src = src;
    }
  </script>


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