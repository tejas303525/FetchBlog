<?php
include '../components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['send'])){
   $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
   $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
   $msg = filter_var($_POST['msg'], FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_message->execute([$name, $email, $number, $msg]);

   if($select_message->rowCount() > 0){
      $message = 'You’ve already sent this message!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $number, $msg]);
      $message = 'Message sent successfully!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Contact | Dora Infotech</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <style>
   * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
   }

   body {
      background: #f0f2f5;
      color: #333;
   }

   /* Navbar Styling */
   .navbar {
      background: #fff;
      padding: 14px 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      margin-bottom: 30px;
      border-radius: 8px;
   }

   .navbar a {
      text-decoration: none;
      color: #333;
      font-size: 16px;
      margin-left: 18px;
      transition: 0.3s;
   }

   .navbar a:hover {
      color: #0d6efd;
   }

   .phone {
      font-weight: 500;
   }

   /* Contact Form Section */
   .contact {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
   }

   .contact form {
      background: #fff;
      padding: 35px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
      max-width: 500px;
      width: 100%;
      display: flex;
      flex-direction: column;
      gap: 18px;
   }

   .contact form h3 {
      font-size: 30px;
      color: #333;
      text-align: center;
      margin-bottom: 10px;
   }

   .contact form .box {
      padding: 14px 16px;
      border: 1px solid #ddd;
      border-radius: 6px;
      font-size: 16px;
      width: 100%;
      transition: border-color 0.3s, box-shadow 0.3s;
   }

   .contact form .box:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 5px rgba(13, 110, 253, 0.2);
      outline: none;
   }

   .contact form textarea.box {
      resize: vertical;
      min-height: 140px;
   }

   .contact form .btn {
      background: linear-gradient(135deg, #0d6efd, #00bfff);
      color: #fff;
      padding: 14px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
   }

   .contact form .btn:hover {
      background: linear-gradient(135deg, #0056b3, #009acd);
   }

   /* Message display */
   .message {
      text-align: center;
      padding: 12px 20px;
      border-radius: 6px;
      margin-bottom: 20px;
      max-width: 500px;
      color: #fff;
      background: #0d6efd;
   }

   /* Back button */
   .back-btn {
      display: inline-flex;
      align-items: center;
      margin-bottom: 20px;
      text-decoration: none;
      color: #333;
      font-size: 16px;
      background: #e9ecef;
      padding: 8px 14px;
      border-radius: 6px;
      transition: background 0.3s, color 0.3s;
   }

   .back-btn i {
      margin-right: 8px;
   }

   .back-btn:hover {
      background: #0d6efd;
      color: #fff;
   }

   @media (max-width: 576px) {
      .navbar {
         flex-direction: column;
         gap: 10px;
      }
      .nav-right {
         display: flex;
         flex-direction: column;
         gap: 8px;
      }
   }
   </style>
</head>

<body>

<!-- Navbar -->


<section class="contact">

   <!-- Back button -->
   <a href="printing.php" class="back-btn"><i class="fa-solid fa-arrow-left"></i> Back to Products</a>

   <!-- Message display -->
   <?php if(!empty($message)): ?>
      <div class="message"><?= $message; ?></div>
   <?php endif; ?>

   <!-- Contact form -->
   <form action="" method="post">
      <h3>Get in Touch</h3>
      <input type="text" name="name" placeholder="Enter your name" required maxlength="20" class="box">
      <input type="email" name="email" placeholder="Enter your email" required maxlength="50" class="box">
      <input type="number" name="number" min="0" max="9999999999" placeholder="Enter your number" required onkeypress="if(this.value.length == 10) return false;" class="box">
      <textarea name="msg" class="box" placeholder="Enter your message" cols="30" rows="10"></textarea>
      <input type="submit" value="Send Message" name="send" class="btn">
   </form>

</section>

</body>
</html>
