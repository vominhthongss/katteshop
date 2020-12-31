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
        if($_POST["MSHH"]){
            $MSHH=$_POST['MSHH'];
        }
        if($_POST["SOLUONG"]){
            $SOLUONG=$_POST['SOLUONG'];
        }

        for($i=0;$i<count($MSHH);$i++){
            echo $MSKH.' - '.$SODONDH.' - '.$MSHH[$i].' - '.$SOLUONG[$i].'<br>';
        }

        include "dbConfig.php";
        $sql = "DELETE FROM dathang WHERE SoDonDH='$SODONDH' AND MSKH='$MSKH' ";
        if ($conn->query($sql) === TRUE){
            for($i=0;$i<count($MSHH);$i++){
                $sql = "UPDATE hanghoa SET SoLuongHang=SoLuongHang+$SOLUONG[$i] WHERE MSHH='$MSHH[$i]'";
                if ($conn->query($sql) === TRUE){
                    // echo 'Thành công !';
                    #quay lại trang index
                    echo'
                    <script>
                    window.onload = function() {
                        if (!window.location.hash) {
                            window.location = "hoadondadat.php";                      
                        }
                    }
                    </script>';
                }
                else{
                    echo 'Lỗi !';
                }
            }

        }
        else{
            echo 'Lỗi !';
        }

        


    ?>

    <?php include "body-footer.php" ?>
    <link rel="stylesheet" href="css/katte.css">
    <script src="javascript/katte.js"></script>
</body>

</html>