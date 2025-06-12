<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../view/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../view/css/font-awesome.min.css" type="text/css">


    <link rel="stylesheet" href="../view/css/jquery-ui.min.css" type="text/css">


    <link rel="stylesheet" href="../view/css/owl.carousel.min.css" type="text/css">

    <link rel="stylesheet" href="../view/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../view/css/style.css" type="text/css">
    <link rel="stylesheet" href="../view/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../view/css/nice-select.css" type="text/css">
</head>
<style>
    .shop_section {
        padding: 60px 0;
        background-color: #f9f9f9;
    }

    .heading_container h2 {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 40px;
        position: relative;
        display: inline-block;
        color: #333;
    }

    .heading_container h2::after {
        content: "";
        width: 60%;
        height: 3px;
        background-color: #ff6f61;
        display: block;
        margin: 10px auto 0;
        border-radius: 5px;
    }

    .box {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        margin: 20px 10px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        width: 100%;
        max-width: 300px;
    }

    .box:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    .box a {
        text-decoration: none;
        color: inherit;
    }

    .img-box {
        background-color: #f1f1f1;
        padding: 20px;
    }

    .img-box img {
        max-width: 100%;
        height: 220px;
        object-fit: cover;
        border-radius: 10px;
    }

    .detail-box {
        padding: 20px 10px;
    }

    .detail-box h6 {
        margin: 5px 0;
        font-size: 1.1rem;
        color: #333;
    }

    .detail-box span {
        color: #ff6f61;
        font-weight: bold;
        margin-left: 5px;
    }

    .new {
        position: absolute;
        top: 15px;
        right: 15px;
        background-color: #ff6f61;
        color: #fff;
        font-size: 0.8rem;
        padding: 5px 10px;
        border-radius: 30px;
        font-weight: bold;
    }

    .buy-form {
        margin-top: 10px;
    }

    .buy-btn {
        background-color: #ff6f61;
        border: none;
        padding: 10px 20px;
        margin-bottom: 20px;
        border-radius: 30px;
        font-size: 1rem;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .buy-btn:hover {
        background-color: #e85b50;
    }

    .btn-box a {
        display: inline-block;
        padding: 12px 30px;
        background-color: #ff6f61;
        color: white;
        font-weight: bold;
        border-radius: 30px;
        text-decoration: none;
        transition: background-color 0.3s ease;
        font-size: 1rem;
    }

    .btn-box a:hover {
        background-color: #e85b50;
    }

    /* Đặt style cho toàn bộ form */
    form {
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 500px;
        /* Giới hạn chiều rộng form */
        background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
        /* Gradient nền */
        padding: 30px;
        border-radius: 15px;
        /* Bo góc */
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        /* Hiệu ứng bóng */
        font-family: 'Arial', sans-serif;
        /* Font chữ hiện đại */
    }

    /* Style cho label */
    label {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        margin-top: 15px;
    }

    /* Style cho input */
    input[type="email"],
    input[type="text"],
    input[type="password"] {
        padding: 12px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 8px;
        outline: none;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    /* Hiệu ứng khi focus vào input */
    input[type="email"]:focus,
    input[type="text"]:focus,
    input[type="password"]:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
    }

    /* Placeholder style */
    input::placeholder {
        color: #999;
        font-style: italic;
    }

    /* Style cho button */
    button {
        margin-top: 25px;
        padding: 12px;
        font-size: 16px;
        font-weight: 600;
        color: #fff;
        background: linear-gradient(90deg, #007bff, #00d4ff);
        /* Gradient button */
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    /* H ascendancy effect khi hover button */
    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.4);
    }

    /* Responsive cho màn hình nhỏ */
    @media (max-width: 600px) {
        form {
            padding: 20px;
            margin: 20px;
        }
    }
</style>

<body>
    <!-- Page Preloder -->
 
    <?php
    $user = $_SESSION['user'];
    ?>



    <?php if (isset($_GET['success'])) { ?>
        <div class="success-message">Cập nhật thành công!</div>
    <?php } ?>
    <div style="display: flex;width:100%;justify-content: center; margin-top: 30px;margin-bottom: 40px;">
        <form action="?controller=auth&action=updateUser" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="<?= htmlspecialchars($user['email'] ?? '') ?>">

            <label for="name">Tên:</label>
            <input type="text" id="name" name="name" required value="<?= htmlspecialchars($user['name'] ?? '') ?>">

            <label for="address">Địa chỉ:</label>
            <input type="text" id="address" name="address" required value="<?= htmlspecialchars($user['address'] ?? '') ?>">

            <label for="phone">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" required value="<?= htmlspecialchars($user['phone'] ?? '') ?>">

            <label for="password">Mật khẩu mới:</label>
            <input type="password" id="password" name="password" placeholder="Để trống nếu không muốn đổi">

            <button type="submit" name="update">Cập nhật</button>
        </form>

    </div>
    <!-- Featured Section Begin -->
  
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
   
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="../view/js/jquery-3.3.1.min.js"></script>
    <script src="../view/js/bootstrap.min.js"></script>
    <script src="../view/js/jquery.nice-select.min.js"></script>
    <script src="../view/js/jquery-ui.min.js"></script>
    <script src="../view/js/jquery.slicknav.js"></script>
    <script src="../view/js/mixitup.min.js"></script>
    <script src="../view/js/owl.carousel.min.js"></script>
    <script src="../view/js/main.js"></script>



</body>

</html>