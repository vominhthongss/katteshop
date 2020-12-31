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


    <?php include "body-header.php" ?>
    <?php include "body-navigation.php" ?>

    <?php 
    $MSNV='';
    $MK='';
    include "dbConfig.php";
    //không có tên đăng nhập thì quay lại index
    if(!empty($_POST["MSNV"])){
        $MSNV=$_POST['MSNV'];
        
    }
    else {
        echo '<script>
        window.onload = function() {
            if (!window.location.hash) {
                window.location = "index.php"; 
                
                
            }
        }
        </script>
        ';
    }
    if(!empty($_POST["MK"])){
        $MK=$_POST['MK'];
        
    }
    else{
        echo '<script>
        window.onload = function() {
            if (!window.location.hash) {
                window.location = "index.php"; 
                
                
            }
        }
        </script>
        ';
    }
    //không có tên đăng nhập thì quay lại index
    
    $sql = "SELECT MSNV,MK FROM nhanvien WHERE MSNV='$MSNV' AND MK='$MK'";
    $result = $conn->query($sql);

    if ($result->num_rows ==1) {
        
        
        echo '<h1 class="tongtien">CHÀO MỪNG BẠN ĐẾN TRANG QUẢN LÝ KATTE SHOP !</h1>';
        setcookie("MSNV_CK",$MSNV);
          


    } else {
        echo '<script>
        window.onload = function() {
            if (!window.location.hash) {
                window.location = "index.php"; 
                
                
            }
        }
        </script>
        ';
    }
    $conn->close();

    ?>

    <?php include "body-footer.php" ?>
    <link rel="stylesheet" href="css/katte.css">
    <script src="javascript/katte.js"></script>
</body>

</html>