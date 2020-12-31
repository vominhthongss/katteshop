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
    <?php 
        $THANHTIEN=0;
        $MSKH='';
        
        if(!isset($_COOKIE['username'])) {
                
        } else {
            $MSKH=$_COOKIE['username'];
            // echo "Mã số khách hàng: " . $MSKH."<br>";
        }
        ///////
        echo '<h1 style="text-align:center;float:left;width:100%">GIỎ HÀNG CỦA BẠN</h1>' ;
        if($MSKH!=''){
            include "dbConfig.php"; 
            $sql = "SELECT giohang.MSHH,hanghoa.TenHH,giohang.SoLuong,hanghoa.Gia,(giohang.SoLuong*hanghoa.Gia) AS ThanhTien,hanghoa.Hinh  FROM giohang,hanghoa WHERE MSKH='$MSKH' AND giohang.MSHH=hanghoa.MSHH ORDER BY TenHH ASC";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                
                echo '<table class="tb">';
                echo '
                <tr>
    
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
                Xóa
                </th>

            </tr>   
                ';

                
                while($row = $result->fetch_assoc()){
                echo'<form class="formgiohang" action="xoagiohang.php" method="POST">';
                   echo '
                   
                   <tr>
                   
                   <input class="oGioHang" type="hidden" name="MSHH" value='.$row['MSHH'].' readonly>
                   
                   <td style="width:100px" >
                    <img style="width:20%;" src="'.$row['Hinh'].'" >
                    <br>
                    <p>'.$row['TenHH'].'</p>
                    </td>
                    <td>
                        <input class="oGioHang" type="text" name="SOLUONG" value='.$row['SoLuong'].' readonly>
                    </td>
                    <td>
                        <input class="oGioHang" type="text" name="GIA" value='.$row['Gia'].' readonly>
                    </td>
                    <td>
                        <input class="oGioHang" type="text" name="THANHTIEN" value='.$row['ThanhTien'].' readonly>
                    </td> 
                    <td>
                        <input style="background-color:brown;color:white;" type="submit" value="Xóa">
                    </td>   
                    </tr>
                   ';
                   $THANHTIEN+=$row['ThanhTien'];
                   echo '</form>';
                }
                echo '</table>  ';
                //echo '<h2 style="text-align:center;color:black;">Tổng hóa đơn<h2>';
                //echo '<h2 style="text-align:center;color:brown;">'.$THANHTIEN.' VNĐ<h2>';
                //echo'<input class="btnmua" type="button" onclick="submit()" value="ĐẶT">';
                    
                
                echo '<br><br><br>';
            }
            else {
               // echo '<h2 style="text-align:center;color:brown;">Xin lỗi !<h2><br><br>';
            }
            
            //echo '<h1 style="float:left;">&nbsp;&nbsp;Tổng hóa đơn: </h1><h1 class="tongtien">&nbsp;&nbsp;'.$THANHTIEN.' VNĐ<h1>';
        }
        else{
            echo '<script>alert("Hãy đăng nhập !");</script>';
            echo'
            <script>
            window.onload = function() {
                if (!window.location.hash) {
                    window.location = "index.php ";                       
                }
            }
            </script>';
        }
        ////////
        $THANHTIEN=0;
        if($MSKH!=''){
            include "dbConfig.php"; 
            $sql = "SELECT giohang.MSHH,hanghoa.TenHH,giohang.SoLuong,hanghoa.Gia,(giohang.SoLuong*hanghoa.Gia) AS ThanhTien,hanghoa.Hinh  FROM giohang,hanghoa WHERE MSKH='$MSKH' AND giohang.MSHH=hanghoa.MSHH ORDER BY TenHH ASC";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                echo'<form class="formgiohang" action="chi-tiet-don-hang-gio-hang.php" method="POST">';
                echo '<table class="tb"  style="display:none;">';
            //     echo '
            //     <tr>

            //     <th>
            //     Tên hàng hóa
            //     </th>
            //     <th>
            //     Số lượng
            //     </th>
            //     <th>
            //     Đơn giá
            //     </th>
            //     <th>
            //     Thành tiền
            //     </th>

            // </tr>   
            //     ';

                
                while($row = $result->fetch_assoc()){
                   
                   echo '
                   
                   <tr>
 
                   <td style="width:100px" >
                    <img style="width:20%;" src="'.$row['Hinh'].'" >
                    <br>
                    <p>'.$row['TenHH'].'</p>
                    </td>
                    <td>
                     <input class="oGioHang" type="text" name="SOLUONG" value='.$row['SoLuong'].' readonly>
                    </td>
                    <td>
                        <input class="oGioHang" type="text" name="GIA" value='.$row['Gia'].' readonly>
                    </td>
                    <td>
                        <input class="oGioHang" type="text" name="THANHTIEN" value='.$row['ThanhTien'].' readonly>
                    </td>    
                    </tr>
                   ';
                   $THANHTIEN+=$row['ThanhTien'];
                   
                }
                echo '</table>  ';
                echo '<h2 style="text-align:center;color:black;">Tổng hóa đơn<h2>';
                echo '<h2 style="text-align:center;color:brown;">'.$THANHTIEN.' VNĐ<h2>';
                echo'<input class="btnmua" type="button" onclick="submit()" value="ĐẶT">
                    
                </form>';
                echo '<br><br><br>';
            }
            else {
                echo '<h2 style="text-align:center;color:brown;">Bạn chưa có món hàng nào !<h2><br><br>';
            }
            
            //echo '<h1 style="float:left;">&nbsp;&nbsp;Tổng hóa đơn: </h1><h1 class="tongtien">&nbsp;&nbsp;'.$THANHTIEN.' VNĐ<h1>';
        }
        else{
            echo '<script>alert("Hãy đăng nhập !");</script>';
            echo'
            <script>
            window.onload = function() {
                if (!window.location.hash) {
                    window.location = "index.php ";                       
                }
            }
            </script>';
        }

        $conn->close();

    ?>

    <?php include "body-footer.php" ?>
    <link rel="stylesheet" href="css/katte.css">
    <script src="javascript/katte.js"></script>
</body>

</html>