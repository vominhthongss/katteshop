<!-- SELECT g.MSKH,g.SoDonDH,g.NgayDH,SUM(g.ThanhTien) as TongTien,g.TrangThai
from (SELECT a.MSKH,a.SoDonDH,CONCAT(DAY(a.NgayDH),'/',MONTH(a.NgayDH),'/',YEAR(a.NgayDH)) as NgayDH,c.TenHH,b.SoLuong,b.GiaDatHang,(b.SoLuong*b.GiaDatHang) as ThanhTien,a.TrangThai,c.Hinh FROM dathang as a,chitietdathang as b,hanghoa as c
WHERE a.SoDonDH=b.SoDonDH and b.MSHH=c.MSHH and a.MSKH='vmt' ORDER BY NgayDH DESC) as g
GROUP BY g.MSKH,g.SoDonDH; -->
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
        if($MSKH!=''){
            include "dbConfig.php"; 
            $sql = "SELECT g.MSKH,g.SoDonDH,g.NgayDH,SUM(g.ThanhTien) as TongTien,g.TrangThai
            from (SELECT a.MSKH,a.SoDonDH, NgayDH,c.TenHH,b.SoLuong,b.GiaDatHang,(b.SoLuong*b.GiaDatHang) as ThanhTien,a.TrangThai,c.Hinh FROM dathang as a,chitietdathang as b,hanghoa as c
            WHERE a.SoDonDH=b.SoDonDH and b.MSHH=c.MSHH and a.MSKH='$MSKH' ORDER BY NgayDH DESC) as g
            GROUP BY g.MSKH,g.SoDonDH ORDER BY NgayDH DESC";
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
                        Tổng Tiền
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
                            <form style="height:6px" action="hoadonkh.php" method="POST">
                            <input type="hidden" name="SODONDH" value='.$row['SoDonDH'].'>
                            <input type="submit" value='.$row['SoDonDH'].' style="background-color:brown;color:white;" >
                            </form>
                        </td>
                        <td>
                        '.$row['NgayDH'].'
                        </td>
                    
                        <td>
                        '.$row['TongTien'].' VNĐ
                        </td>
                        <td>
                        '.$row['TrangThai'].'
                        </td>
                    </tr>';

                
                
                }
                echo'
                </table> 
                ';
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