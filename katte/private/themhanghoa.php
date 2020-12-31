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
                echo '<form style="display:none;" action="upload.php" method="post" enctype="multipart/form-data">';
                
                }
        else{
            echo '<h1 style="text-align:center;float:left;width:100%">THÊM SẢN PHẨM MỚI</h1>' ;
            echo'<form style="margin-top:20px;float:left;width:100%;" action="upload.php" method="post" enctype="multipart/form-data">';

        }
        if(isset($_COOKIE["MSNV_CK"])){
            //echo $_COOKIE["MSNV_CK"];
        }
        
    ?>



    <table class="tb">
        <tr>

            <th>
                Tên nhóm
            </th>
            <th>
                Mã số hàng hóa
            </th>
            <th>
                Tên hàng hóa
            </th>
            <th>
                Giá
            </th>
            <th>
                Số lượng
            </th>

            <th>
                Chọn hình
            </th>
            <th>
                Mô tả
            </th>
        </tr>
        <tr>

            <td>
                <?php
                        include "dbConfig.php"; 
                        $sql="SELECT MaNhom,TenNhom FROM nhomhanghoa ORDER BY TenNhom ASC";
                        $result = $conn->query($sql);
                        if($result->num_rows>0){
                            echo '<select name="MANHOM" >';
                            while($row = $result->fetch_assoc()){
                                echo '<option value='.$row['MaNhom'].'>'.$row['TenNhom'].' </option>';
                            }
                            echo '</select>';
                        }
                    ?>


            </td>
            <td>
                <input maxlength="5" type="text" name="MSHH" style="text-transform:uppercase">

            </td>
            <td>
                <input maxlength="50" type="text" name="TENHH">
            </td>
            <td>
                <input maxlength="11" type="number" name="GIA">
            </td>
            <td>
                <input maxlength="4" type="number" name="SOLUONG">
            </td>

            <td>
                <input type="file" name="fileToUpload" id="fileToUpload">


            </td>
            <td>

                <input maxlength="200" type="text" name="MOTA">

            </td>
        </tr>

    </table>

    <input type="hidden" name="CONHANVIEN" value="CONHANVIEN" />
    <input style="margin-top:20px;" class="btnthem" type="submit" value="ĐĂNG SẢN PHẨM" name="submit">
    </form>

    <?php include "body-footer.php" ?>
    <link rel="stylesheet" href="css/katte.css">
    <script src="javascript/katte.js"></script>
</body>

</html>