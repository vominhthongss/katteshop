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
    // $SODONDH='';
    // $MSKH='';
    // $MSHH='';
    // $NGAYDH='';
    $TRANGTHAI='Đang chờ';
    // $SODONG='';
    // $GIA='';
    // $SOLUONG='';
    //bảng đặt hàng
    if($_POST["SODONDH_dathang"]){
        $SODONDH_dathang=$_POST['SODONDH_dathang'];
    }
    if($_POST["SODONDH"]){
        $SODONDH=$_POST['SODONDH'];
    }
    if(!isset($_COOKIE['username'])) {
        
    } else {
        $MSKH=$_COOKIE['username'];
    }
    if($_POST["MSHH"]){
        $MSHH=$_POST['MSHH'];
    }
    if($_POST["SOLUONG"]){
        $SOLUONG=$_POST['SOLUONG'];
        }

    if($_POST["GIA"]){
        $GIA=$_POST['GIA'];
    }
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $NGAYDH=date("Y-m-d H:i:s");
    for($i=0;$i<count($MSHH);$i++){
        echo $SODONDH[$i].' '.$MSHH[$i].' '.$SOLUONG[$i].' '.$GIA[$i].'<br>';
    }
    
    
    

    // THÊM NGÀY echo date("Y-m-d");
    // THÊM TRẠNG THÁI ;

    //bảng chi tiết đặt hàng
    //$SODONDH
////////////////////////////// THÊM gd1
    include "dbConfig.php";
    $sql = "INSERT INTO dathang (SoDonDH, MSKH, MSNV, NgayDH, TrangThai) VALUES ('$SODONDH_dathang', '$MSKH', NULL,'$NGAYDH','$TRANGTHAI')";
        
    if ($conn->query($sql) === TRUE) {
        for($i=0;$i<count($MSHH);$i++){
            $sql = "INSERT INTO chitietdathang (SoDonDH, MSHH, SoLuong, GiaDatHang) VALUES ('$SODONDH[$i]', '$MSHH[$i]', '$SOLUONG[$i]','$GIA[$i]')";
            if ($conn->query($sql) === TRUE) {
                $sql = "UPDATE hanghoa SET SoLuongHang=SoLuongHang-'$SOLUONG[$i]' WHERE MSHH='$MSHH[$i]'";
                if ($conn->query($sql) === TRUE) {
                    echo "Đặt thành công !";
                     
        
        
                } else {
                    echo "Lỗi trừ số lượng hàng: " . $sql . "<br>" . $conn->error;
                }


            } 
        
            else {
                echo "Lỗi chi tiết đặt hàng: " . $sql . "<br>" . $conn->error;
            }
        }
        $sql = "DELETE FROM giohang WHERE MSKH='$MSKH' ";
                if ($conn->query($sql) === TRUE) {
                    echo "Xóa giỏ hàng!";
                     
        
        
                } else {
                    echo "Lỗi trừ số lượng hàng: " . $sql . "<br>" . $conn->error;
                }
        #quay lại trang index
        echo'
        <script>
        window.onload = function() {
            if (!window.location.hash) {
                window.location = "index.php ";                      
            }
        }
        </script>';
        #quay lại index   
        
    } else {
        echo "Lỗi đặt hàng: " . $sql . "<br>" . $conn->error;
    }

  
    $conn->close();
     

    ?>
    <!-- <?php include "body-footer.php" ?> -->
    <link rel="stylesheet" href="css/katte.css">
    <script src="javascript/katte.js"></script>

</body>

</html>