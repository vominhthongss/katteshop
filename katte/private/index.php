<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<head>
    <title>
        Trang Quản Lý Katte Shop
    </title>
    <link rel="icon" href="images/logoshop.png">
</head>

<body>
    <?php include "dbConfig.php"
    
    ?>
    <?php include "login-header.php" ?>
    <div class="loginform" id="loginform">

        <h3>ADMIN ĐĂNG NHẬP</h3>
        <form action="admin.php" class="loginform-content" method="POST">
            <div>
                <p>Tên đăng nhập: </p>
                <input class="onhap" id="tendangnhap" name="MSNV" type="text">
                <p>Password: </p>
                <input class="onhap" id="matkhau" name="MK" type="password">
                <br>
                <br>
                <button class="nutdkdn" type="submit">Đăng nhập</button>
            </div>
        </form>
    </div>




    <link rel="stylesheet" href="css/katte.css">
    <script src="javascript/katte.js"></script>

</body>

</html>