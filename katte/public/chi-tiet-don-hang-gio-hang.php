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
    $THANHTIEN=0;
    $MSKH='';
    $MSHH='';
    $TENHH='';
    $SODONDH='';
    // if($_POST["MSHH"]){
    //     $MSHH=$_POST['MSHH'];
    // }
    // $GIA='';
    // if($_POST["GIA"]){
    //     $GIA=$_POST['GIA'];
    // }

    // $SOLUONG='';
    // if($_POST["SOLUONG"]){
    // $SOLUONG=$_POST['SOLUONG'];
    // }
    
    if(!isset($_COOKIE['username'])) {
        
    } else {
        
        $MSKH=$_COOKIE['username'];
    }
    echo '<h1 style="text-align:center;float:left;width:100%">HÓA ĐƠN CỦA BẠN</h1>' ;
    if($MSKH!=''){
        $SODONDH=substr(md5(time()), 0, 5);
        //echo"<br>Chèn cái này vào dathang <br>";
        //echo $SODONDH.' | '; echo $MSKH.' | ' ;echo date("Y-m-d");echo" | Chưa chờ xác nhận <br>";
        include "dbConfig.php"; 
        $sql = "SELECT giohang.MSHH,hanghoa.TenHH,giohang.SoLuong,hanghoa.Gia,(giohang.SoLuong*hanghoa.Gia) AS ThanhTien,hanghoa.Hinh  FROM giohang,hanghoa WHERE MSKH='$MSKH' AND giohang.MSHH=hanghoa.MSHH ORDER BY TenHH ASC ";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            echo '<form action="dathanggiohang.php" method="POST">';
            echo'<input class="oGioHang" type="hidden" name="SODONDH_dathang" value='.$SODONDH.' readonly>';
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

            </tr>   
                ';


            while($row = $result->fetch_assoc()){
                // $MSHH=$row['MSHH'];
                // $TENHH=$row['TenHH'];
                // $SOLUONG=$row['SoLuong'];
                // $GIA=$row['Gia'];

                //echo"<br><br>Chèn cái này vào chitietdathang <br><br>";
                // echo $SODONDH; echo' | '; echo $MSHH.' | '; echo $SOLUONG.' | '; echo $GIA;
                echo '<tr>';
                echo'<input class="oGioHang" type="hidden" name="SODONDH[]" value='.$SODONDH.' readonly>';
                echo'<input class="oGioHang" type="hidden" name="MSHH[]" value='.$row['MSHH'].' readonly>';
                echo '<td style="width:100px" >
                <img style="width:20%;" src="'.$row['Hinh'].'" >
                <br>
                '.$row['TenHH'].'
                </td>';
                echo'<td><input class="oGioHang" type="text" name="SOLUONG[]" value='.$row['SoLuong'].' readonly></td>';
                echo'<td><input class="oGioHang" type="text" name="GIA[]" value='.$row['Gia'].' readonly></td>';        
                echo'<td><input class="oGioHang" type="text" value='.$row['ThanhTien'].' readonly></td>';
                echo '</tr>';
                $THANHTIEN+=$row['ThanhTien'];
                   
            }
            echo '</table>';
            
            echo '<h2 style="text-align:center;color:black;">Tổng hóa đơn<h2>';
            echo '<h2 style="text-align:center;color:brown;">'.$THANHTIEN.' VNĐ<h2>';
            echo '<input class="btnmua" type="button" onclick="submit()" value="THANH TOÁN">';
            echo '</form>';
            echo '<br><br><br>';
        }
        else {
             echo '0 kết quả.';
        }
        //echo '<h1 style="float:left;">&nbsp;Tổng hóa đơn: </h1><h1 class="tongtien">&nbsp;'.$THANHTIEN.' VNĐ<h1>';
        $conn->close();

        

        

    }

        
        


    
    else{
        echo '<script>alert("Hãy đăng nhập !");</script>';
        echo'
        <script>
        window.onload = function() {
            if (!window.location.hash) {
                window.location = "chi-tiet-san-pham.php?MSHH='.$MSHH.' ";                       
            }
        }
        </script>';
    }

    ?>

    <?php include "body-footer.php" ?>
    <link rel="stylesheet" href="css/katte.css">
    <script src="javascript/katte.js"></script>

</body>

</html>