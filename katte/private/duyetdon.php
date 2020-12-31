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

        if(empty($_POST['CONHANVIEN'])){
            echo '<script>
            window.onload = function() {
            if (!window.location.hash) {
                window.location = "index.php"; 
                
                
            }
        }
        </script>
        ';
       // echo '<form style="display:none;" action="upload.php" method="post" enctype="multipart/form-data">';

        }
        else{

        
        include "dbConfig.php";
        if(isset($_COOKIE["MSNV_CK"])){
            $MSNV=$_COOKIE["MSNV_CK"];

        }
        if($_POST['SODONDH']){
            $SODONDH=$_POST['SODONDH'];
        }
       // echo'Nhan vien = '.$MSNV.'So don = '.$SODONDH;
        $sql = "UPDATE dathang SET TrangThai='Đã giao', MSNV='$MSNV' WHERE SoDonDH='$SODONDH' ";

        if ($conn->query($sql) === TRUE) {
        echo '<h1 style="text-align:center;float:left;width:100%">DUYỆT THÀNH CÔNG !</h1>' ;
        echo '
        <form action="donhangchoduyet.php" method="POST">
        <input class="btnmua" type="submit" href="#donhangchoduyet" value="QUAY LẠI">
        <input type="hidden" name="CONHANVIEN" value="CONHANVIEN" />
        </form>
        ';
        // echo '
        // <script>
        // window.onload = function() {
        //     if (!window.location.hash) {
        //         window.location = "donhangchoduyet.php"; 
                
                
        //     }
        // }
        // </script>
        // ';


        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
    <?php include "body-footer.php" ?>
    <link rel="stylesheet" href="css/katte.css">
    <script src="javascript/katte.js"></script>
</body>

</html>