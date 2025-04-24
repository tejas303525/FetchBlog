<?php
include 'components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Quick View</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <style>
      *{
         margin:0; padding:0;
         box-sizing:border-box;
         font-family: 'Georgia', serif;
      }
      body{
         background:#f9f9f9;
         color:#333;
      }

      .navbar{
         display:flex;
         justify-content:space-between;
         align-items:center;
         padding:15px 30px;
         background:#fff;
         border-bottom:1px solid #ccc;
         box-shadow:0 3px 6px rgba(0,0,0,0.1);
      }
      .navbar .logo{
         font-size:1.7rem;
         color:#2C3E50;
         font-weight:bold;
         letter-spacing:1px;
      }
      .navbar .nav-right{
         display:flex;
         align-items:center;
         gap:20px;
         font-size:1rem;
      }
      .navbar .nav-right a{
         text-decoration:none;
         color:#333;
         transition:0.3s;
         font-weight:500;
      }
      .navbar .nav-right a:hover{
         color:#2C3E50;
      }
      .navbar .phone{
         color:#555;
         font-weight:500;
      }

      .heading{
         text-align:center;
         font-size:2.2rem;
         margin:30px 0 20px;
         color:#2C3E50;
         border-bottom:3px solid #2C3E50;
         display:inline-block;
         padding-bottom:8px;
      }

      .quick-view{
         max-width:1100px;
         margin:20px auto;
         padding:0 20px;
      }
      .box{
         background:#fff;
         border:1px solid #ddd;
         border-radius:8px;
         padding:20px;
         margin-bottom:40px;
         box-shadow:0 3px 6px rgba(0,0,0,0.1);
      }
      .box .row{
         display:flex;
         flex-wrap:wrap;
         gap:20px;
      }
      .image-container{
         flex:1 1 45%;
      }
      .image-container .main-image img{
         width:100%;
         height:400px;
         object-fit:cover;
         border-radius:6px;
         border:1px solid #ddd;
         transition:0.3s ease;
      }
      .image-container .main-image img:hover{
         border-color:#2C3E50;
      }
      .sub-image{
         display:flex;
         gap:10px;
         margin-top:12px;
         justify-content:center;
      }
      .sub-image img{
         width:80px;
         height:80px;
         object-fit:cover;
         border:1px solid #ccc;
         border-radius:6px;
         cursor:pointer;
         transition:0.3s;
      }
      .sub-image img:hover{
         border-color:#2C3E50;
         transform:scale(1.05);
      }
      .content{
         flex:1 1 50%;
         display:flex;
         flex-direction:column;
         gap:15px;
      }
      .content .name{
         font-size:1.5rem;
         font-weight:bold;
         color:#2C3E50;
      }
      .content .flex{
         display:flex;
         align-items:center;
         gap:15px;
         margin:10px 0;
      }
      .content .price{
         font-size:1.3rem;
         color:#2C3E50;
         font-weight:600;
      }
      .content .qty{
         width:60px;
         padding:8px;
         border:1px solid #ccc;
         border-radius:4px;
         text-align:center;
      }
      .content .details{
         font-size:1rem;
         color:#555;
         line-height:1.6;
      }
      .flex-btn{
         display:flex;
         gap:12px;
         margin-top:15px;
      }
      .btn, .option-btn{
         flex:1;
         padding:12px 18px;
         border:none;
         border-radius:6px;
         font-size:1rem;
         color:#fff;
         cursor:pointer;
         transition:0.3s;
      }
      .btn{
         background:#2C3E50;
      }
      .btn:hover{
         background:#34495E;
      }
      .option-btn{
         background:#7F8C8D;
      }
      .option-btn:hover{
         background:#95A5A6;
      }
      .empty{
         text-align:center;
         color:#888;
         font-size:1.2rem;
         margin:30px 0;
      }
      .back-btn{
         display:inline-block;
         margin:20px 0 0 20px;
         text-decoration:none;
         color:#2C3E50;
         font-size:1rem;
         transition:0.3s;
      }
      .back-btn:hover{
         text-decoration:underline;
         color:#34495E;
      }
   </style>
</head>
            <body>
            <!-- Navbar -->
            <div class="navbar d-flex justify-content-between align-items-center p-3 shadow-sm" style="background-color: #fff;">
            <!-- Logo -->
            <a href="#" class="navbar-brand p-0 d-flex align-items-center">
            <img src="img/dorainfotech2.jpg" alt="Dora Infotech Logo 1" style="height: 50px; margin-right: 2px; margin-bottom: 5px;">
            <img src="img/dorainfotech.jpg" alt="Dora Infotech Logo 2" style="height: 50px;">
            </a>

            <!-- Right side items -->
            <div class="nav-right d-flex align-items-center gap-4">
                <a href="PMcontact/contact.php" class="text-decoration-none text-dark">
                    <i class="fa-solid fa-envelope"></i> Contact
                </a>
                <div class="phone text-dark">
                    <i class="fa-solid fa-phone"></i> +91-9876543210
                </div>
            </div>
            </div>


            <!-- Back button -->
            <a href="../printing.php" class="back-btn"><i class="fa-solid fa-arrow-left"></i> Back to Products</a>

            <section class="quick-view">
            <h1 class="heading">Product Quick View</h1>

            <?php
            $pid = $_GET['pid'];
            $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?"); 
            $select_products->execute([$pid]);
            if($select_products->rowCount() > 0){
                while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
            ?>
            <form action="" method="post" class="box">
                <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
                <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
                <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
                <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">

                <div class="row">
                    <div class="image-container">
                        <div class="main-image">
                        <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="" class="main-view">
                        </div>
                        <div class="sub-image">
                        <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt=""/>
                        <img src="uploaded_img/<?= $fetch_product['image_02']; ?>" alt=""/>
                        <img src="uploaded_img/<?= $fetch_product['image_03']; ?>" alt=""/>
                        </div>
                    </div>
                    <div class="content">
                        <div class="name"><?= $fetch_product['name']; ?></div>
                        <div class="flex">
                       <!-- <div class="price">$<?= $fetch_product['price']; ?>/-</div>
                        <input type="number" name="qty" class="qty" min="1" max="99" value="1">
                        </div>-->
                        <div class="details"><?= $fetch_product['details']; ?></div>
                       <!--<div class="flex-btn">
                       <input type="submit" value="Add to Cart" class="btn" name="">
                       <input type="submit" name="add_to_wishlist" value="Add to Wishlist" class="option-btn">
                        </div>-->
                    </div>
                </div>
            </form>
            <?php
                }
            }else{
                echo '<p class="empty">No products available!</p>';
            }
            ?>
            </section>

            <script>
            // Image click swap functionality
            document.querySelectorAll('.box').forEach(box => {
                const mainView = box.querySelector('.main-view');
                const subImages = box.querySelectorAll('.sub-image img');
                subImages.forEach(img => {
                    img.addEventListener('click', () => {
                        mainView.src = img.src;
                    });
                });
            });
            </script>
            </body>
            </html>
