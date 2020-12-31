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
    $MSKH='';
    $MSHH='';
    $TENHH='';
    $SODONDH='';
    $THANHTIEN=0;
    $HINH='';
    if($_POST["MSHH"]){
        $MSHH=$_POST['MSHH'];
    }
    $GIA='';
    if($_POST["GIA"]){
        $GIA=$_POST['GIA'];
    }

    $SOLUONG='';
    if($_POST["SOLUONG"]){
    $SOLUONG=$_POST['SOLUONG'];
    }
    
    if(!isset($_COOKIE['username'])) {
        
    } else {
        
        $MSKH=$_COOKIE['username'];
    }
    echo '<h1 style="text-align:center;float:left;width:100%">HÓA ĐƠN CỦA BẠN</h1>' ;
    if($MSKH!=''){
        $SODONDH=substr(md5(time()), 0, 5);
        include "dbConfig.php"; 
        $sql = "SELECT TenHH,Hinh FROM hanghoa WHERE MSHH='$MSHH' ";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $TENHH=$row['TenHH'];
                $HINH=$row['Hinh'];
                   
                   
            }
        }
        else {
             echo '0 kết quả.';
        }
        
        // echo"<br>Chèn cái này vào dathang <br>";
        // echo $SODONDH.' | '; echo $MSKH.' | ' ;echo date("Y-m-d");echo" | Chưa chờ xác nhận <br>";

        // echo"<br><br>Chèn cái này vào chitietdathang <br><br>";
        // echo $SODONDH; echo' | '; echo $MSHH.' | '; echo $SOLUONG.' | '; echo $GIA;

        // echo"<br><br>HIỂN THỊ RA CHO USER XEM<br><br>";
        //echo '<p>&nbsp;&nbsp;'.$TENHH.'<p>';
        $THANHTIEN+=$THANHTIEN+$SOLUONG*$GIA;
        echo'<table class="tb">';
        
        echo '
        <tr>
        <th>
        Số đơn đặt hàng
        </th>
        <th>
        Tên hàng hóa
        </th>
        <th>
        Số lượng
        </th>
        <th>
        Thành tiền
        </th>
        </tr>
        
        ';
        echo '<tr>';
        echo'
        <td>
        '.$SODONDH.'
        </td>
        <td style="width:100px" >
        <img style="width:20%;" src="'.$HINH.'" >
        <br>
        '.$TENHH.'
        </td>
        
        <td>
        '.$SOLUONG.'
        </td>
        <td>
        '.$THANHTIEN.' VNĐ
        </td>
        ';
        echo '</tr>';

        
        // echo'&nbsp;&nbsp;Số đơn đặt hàng: <input class="oGioHang" type="text"value='.$SODONDH.' readonly>';
        // echo'&nbsp;&nbsp;Số lượng: <input class="oGioHang" type="text"value='.$SOLUONG.' readonly>';
        
        
        // echo'&nbsp;&nbsp;Thành tiền: <input class="oGioHang" type="text"value='.$THANHTIEN.' readonly>';

       
        // echo '<h1 style="float:left;">&nbsp;Tổng hóa đơn: </h1><h1 class="tongtien">&nbsp;'.$THANHTIEN.' VNĐ<h1>';
        
        echo '</table>';
        echo'
    
    <form action="dathang.php" method="POST">
    <input type="hidden" name="SODONDH" value='.$SODONDH.'>
    <input type="hidden" name="MSHH" value='.$MSHH.'>
    <input type="hidden" name="SOLUONG" value='.$SOLUONG.'>
    <input type="hidden" name="GIA" value='.$GIA.'>
    <br>
    <input class="btnmua" type="button" onclick="submit()" value="THANH TOÁN">
    </form>

    ';




    $conn->close();

    }






    else{
    echo '<script>
    alert("Hãy đăng nhập !");
    </script>';
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