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
    $SODONG='';
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
        // echo "Mã số khách hàng: " . $MSKH."<br>";
    }
    // echo "Mã hàng hóa = ".$MSHH."<br>";
    // echo "Số lượng = ".$SOLUONG."<br>";

    #Xử lý insert vào bảng GIỎ HÀNG
    #Khi Mã khách hàng khác ""
    if($MSKH!=""){
        include "dbConfig.php";
        ###kiểm tra có trong giỏ hàng chưa để cập nhật
        $sql = "SELECT COUNT(MSHH) AS SODONG FROM giohang WHERE MSHH='$MSHH' AND MSKH='$MSKH' ";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
               $SODONG=$row['SODONG'];
            }
        }
        ##Khi sản phẩm chưa thêm thì thêm vào
        if($SODONG==0){
            
            $sql = "INSERT INTO giohang (MSKH, MSHH, SoLuong) 
            VALUES ('$MSKH', '$MSHH', '$SOLUONG')";
        
            if ($conn->query($sql) === TRUE) {
                echo "Đã thêm vào giỏ hàng";
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }

            echo'
            <script>
            window.onload = function() {
                if (!window.location.hash) {
                    window.location = "chi-tiet-san-pham.php?MSHH='.$MSHH.' ";                       
                }
            }
            </script>';

        }
        #khi sản phẩm đã có thêm rồi cập nhật số lượng lại
        else{
            $sql = "UPDATE giohang SET SoLuong=SoLuong + $SOLUONG WHERE MSKH='$MSKH' AND MSHH='$MSHH'";
        
            if ($conn->query($sql) === TRUE) {
                echo "Đã thêm vào giỏ hàng";
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }

            echo'
            <script>
            window.onload = function() {
                if (!window.location.hash) {
                    window.location = "chi-tiet-san-pham.php?MSHH='.$MSHH.' ";                       
                }
            }
            </script>';

        }
 

    }
    #Khi Mã khách hàng = ""
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
  

    $conn->close();
    #Quay lại trang chi tiết sản phẩm

    

    ?>




    <!-- <?php include "body-footer.php" ?> -->
    <link rel="stylesheet" href="css/katte.css">
    <script src="javascript/katte.js"></script>

</body>

</html>