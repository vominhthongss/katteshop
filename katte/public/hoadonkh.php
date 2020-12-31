<!-- SELECT a.SoDonDH,c.TenHH,b.SoLuong,b.GiaDatHang,(b.SoLuong*b.GiaDatHang) as ThanhTien FROM dathang as a,chitietdathang as b,hanghoa as c
WHERE a.SoDonDH=b.SoDonDH and b.MSHH=c.MSHH and a.MSKH='vmt' -->
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
    <?php include "body-header.php" ?>
    <?php include "body-search.php" ?>
    <?php include "body-navigation.php" ?>
    <br>
    <h1 style="text-align:center;float:left;width:100%">ĐƠN HÀNG BẠN ĐÃ ĐẶT</h1>
    <?php 
    $TONGTIEN=0;
        $MSKH='';
        if(!isset($_COOKIE['username'])) {
                
        } else {
            $MSKH=$_COOKIE['username'];
        }
        if($MSKH==''){
            echo'
            <script>alert("Hãy đăng nhập !"); history.back();</script>
            ';
        }
        if($_POST["SODONDH"]){
            $SODONDH=$_POST['SODONDH'];
        }

        // echo $SODONDH;
        // echo $MSKH;
        echo '<form action="xoadon.php" method="POST">';
        if($MSKH!=''){
            include "dbConfig.php"; 
            $sql = "SELECT a.SoDonDH,c.MSHH,NgayDH,c.TenHH,b.SoLuong,b.GiaDatHang,(b.SoLuong*b.GiaDatHang) as ThanhTien,a.TrangThai,c.Hinh FROM dathang as a,chitietdathang as b,hanghoa as c
            WHERE a.SoDonDH=b.SoDonDH and b.MSHH=c.MSHH and a.MSKH='$MSKH' and a.SoDonDH='$SODONDH' ORDER BY NgayDH DESC";
            // and a.SoDonDH='0d3c6' 
            $result = $conn->query($sql);
            if($result->num_rows>0){
                echo'
                <table class="tb">
                    <tr>
                        <th>
                        Số đơn đặt hàng
                        </th>
                        <th>
                        Ngày đặt hàng
                        </th>
                        <th>
                        Tên hàng hóa
                        </th>
                        <th>
                        Số lượng
                        </th>
                        <th>
                        Đơn giá
                        </th>
                        <th>
                        Thành tiền
                        </th>
                        <th>
                        Trạng thái
                        </th>
                    </tr>
                    ';
                while($row = $result->fetch_assoc()){

                    echo '
                    <tr>
                        <td>
                        <input type="hidden" value="'.$row['SoDonDH'].'" name="SODONDH">
                        '.$row['SoDonDH'].'
                        </td>
                        <td>
                        '.$row['NgayDH'].'
                        </td>
                        <td style="width:100px">
                        <img style="width:20%;" src="'.$row['Hinh'].'" >
                        <br>
                        '.$row['TenHH'].'
                        </td>
                        <td>
                        <input type="hidden" value="'.$row['MSHH'].'" name="MSHH[]">
                        <input type="hidden" value="'.$row['SoLuong'].'" name="SOLUONG[]">
                        '.$row['SoLuong'].'
                        </td>
                        <td>
                        '.$row['GiaDatHang'].'
                        </td>
                        <td>
                        '.$row['ThanhTien'].'
                        </td>
                        <td>
                        '.$row['TrangThai'].'
                        
                        </td>
                    </tr>';
                    $TONGTIEN+=$row['ThanhTien'];
                    $TRANGTHAI=$row['TrangThai'];
                
                
                }
                echo'
                </table> 
                <br>
                <br>';
                if($TRANGTHAI!='Đã giao')
                {
                   echo '<input type="submit" class="btnmua" value="HỦY ĐƠN HÀNG">';
                }
                
                
                
            echo '<form>';
            }
            else {
                echo '<h2 style="text-align:center;color:brown;">Bạn chưa có đơn hàng nào !<h2><br><br><br>';
                
            }
       }


        $conn->close();

    ?>

    <?php include "body-footer.php" ?>
    <link rel="stylesheet" href="css/katte.css">
    <script src="javascript/katte.js"></script>
</body>

</html>