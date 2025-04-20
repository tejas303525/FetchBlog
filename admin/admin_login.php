<?php
include '../components/connect.php';
session_start();

// --- Create default admin if not exists ---
$default_name = 'admin';
$default_pass = sha1('741852');  // updated password here

// Check if admin user exists
$check_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ?");
$check_admin->execute([$default_name]);

if ($check_admin->rowCount() == 0) {
    // Insert default admin
    $insert_admin = $conn->prepare("INSERT INTO `admins` (name, password) VALUES (?, ?)");
    $insert_admin->execute([$default_name, $default_pass]);
}

// --- Login logic ---
if (isset($_POST['submit'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND password = ?");
    $select_admin->execute([$name, $pass]);
    $row = $select_admin->fetch(PDO::FETCH_ASSOC);

    if ($select_admin->rowCount() > 0) {
        $_SESSION['admin_id'] = $row['id'];
        header('location:dashboard.php');
    } else {
        $message[] = 'Incorrect username or password!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Admin Login</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <style>
      body {background: #f0f2f5; font-family: sans-serif;}
      .form-container{display: flex;justify-content: center;align-items: center;height: 100vh;}
      form{background: #fff;padding: 30px;border-radius: 8px;box-shadow: 0 0 10px rgba(0,0,0,0.1);width: 350px;}
      h3{text-align: center;margin-bottom: 15px;color: #333;}
      p{text-align: center;font-size: 14px;margin-bottom: 20px;}
      span{font-weight: bold;color: #007bff;}
      .box{width: 100%;padding: 10px;margin-bottom: 15px;border: 1px solid #ccc;border-radius: 4px;}
      .btn{width: 100%;padding: 10px;background: #007bff;border: none;color: #fff;border-radius: 4px;cursor: pointer;font-size: 16px;}
      .btn:hover{background: #0056b3;}
      .message{padding: 10px;background: #f8d7da;color: #721c24;border: 1px solid #f5c6cb;border-radius: 4px;margin: 10px;text-align: center;}
      .message i{margin-left: 10px;cursor: pointer;}
   </style>
</head>
<body>

<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo '<div class="message"><span>'.$msg.'</span><i class="fas fa-times" onclick="this.parentElement.remove();"></i></div>';
    }
}
?>

<section class="form-container">
   <form action="" method="post">
      <h3>Admin Login</h3>
      <p>Username: <span>admin</span> | Password: <span>741852</span></p>
      <input type="text" name="name" required placeholder="Enter your username" maxlength="20" class="box">
      <input type="password" name="pass" required placeholder="Enter your password" maxlength="20" class="box">
      <input type="submit" value="Login Now" class="btn" name="submit">
   </form>
</section>
</body>
</html>
