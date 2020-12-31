<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<head>
    <title>
        Katte Shop
    </title>
    <link rel="icon" href="images/logoshop.png">
</head>

<body>
    <?php include "dbConfig.php"?>
    <?php include "body-header.php" ?>
    <?php include "body-search.php" ?>
    <?php include "body-navigation.php" ?>
    <?php
    $MSHH='.';
    if($_GET["MSHH"]){
        $MSHH=$_GET['MSHH'];
    }
    $Gia='';
    ?>
    <div>
        <?php
        include "dbConfig.php"; 
        $sql = "SELECT * FROM hanghoa WHERE MSHH='$MSHH' ";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            echo '<div class="khungchitietsp">';
            while($row = $result->fetch_assoc()){
                echo'<img src='.$row['Hinh'].'>';
                echo '</div>';
                echo'<div class=thongtinchitietsp>';
                echo'<h2>'.$row['TenHH'].'</h2>';
                echo'<h2 class="giasp">'.$row['Gia'].'</h2>';
                echo'<h3>Số lượng còn lại: '.$row['SoLuongHang'].' cái</h3>';
                $Gia=$row['Gia'];
            }
        }
        else {
            echo '0 kết quả.';
        }
        $conn->close();
        ?>
        <button class="nutSoLuong" onclick="tangSoLuong()">+</button>
        <button class="nutSoLuong" onclick="giamSoLuong()">-</button>

        <form action="chi-tiet-don-hang.php" method="POST">
            <input type="hidden" name="MSHH" value=<?php echo $MSHH?>>
            <input type="hidden" name="GIA" value=<?php echo $Gia?>>
            <input class="oSoLuong" type="text" id="soLuong" name="SOLUONG" value="1" readonly>

            <br>

            <input class="btnmua" type="button" onclick="submit()" value="MUA">
        </form>
        <form action="themvaogiohang.php" method="POST">
            <input type="hidden" name="MSHH" value=<?php echo $MSHH?>>
            <input type="hidden" name="GIA" value=<?php echo $Gia?>>
            <input class="oSoLuong" type="hidden" id="soLuong2" name="SOLUONG" value="1" readonly>

            <br>
            <input class="btnthem" type="button" value="THÊM VÀO GIỎ HÀNG" onclick="submit()">
        </form>


    </div>
    <?php include "body-footer.php" ?>
    <link rel="stylesheet" href="css/katte.css">
    <script>
    function giamSoLuong() {
        if (soLuong.value > 1) {
            soLuong.value--;
        }
        if (soLuong2.value > 1) {
            soLuong2.value--;
        }
    }

    function tangSoLuong() {
        soLuong.value++;
        soLuong2.value++;
    }
    </script>
    <script src="javascript/katte.js"></script>
</body>

</html>