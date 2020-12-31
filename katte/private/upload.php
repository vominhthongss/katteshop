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
 

  }
  else{
     include "dbConfig.php";

   // function taiHinh($target_dir){
      $target_dir = "..//public/product-images/";
      $target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]) ;
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Kiểm tra có phải ảnh hay không ?
      if(isset($_POST["submit"])) {
        
        
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
       
        if($check !== false) {
         // echo "File ảnh - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "Không phải ảnh.";
          $uploadOk = 0;
        }
      }

      // Kiểm tra file có tồn tại ?
      if (file_exists($target_file)) {
        //echo '<h1 style="text-align:center;float:left;width:100%">FILE ĐÃ TỒN TẠI</h1>' ;
        $uploadOk = 0;
      }

      // Kiểm tra file
      if ($_FILES["fileToUpload"]["name"]> 50000000) {
        echo '<h1 style="text-align:center;float:left;width:100%">FILE QUÁ LỚN !</h1>' ;
        $uploadOk = 0;
      }

      // Chỉ cho phép các định dạng
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        echo "Xin lỗi, chỉ chấp nhận JPG, JPEG, PNG & GIF !";
        $uploadOk = 0;
      }
      $duongdan="";
      // Nếu $uploadOk = 0 thì lỗi
      if ($uploadOk == 0) {
        echo '<h1 style="text-align:center;float:left;width:100%">LỖI ! CHƯA ĐƯỢC UPLOAD !</h1>' ;
      // nếu mọi thứ ok thì upload
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
         // echo " Sản phẩm ". htmlspecialchars( basename($_FILES["fileToUpload"]["name"])). " đã upload";
         //echo 'Đã upload sản phẩm';
         
          $duongdan="product-images/". htmlspecialchars( basename($_FILES["fileToUpload"]["name"]));

          //echo $duongdan;
         $LOI=0;
          if($_POST["MANHOM"]){
            $MANHOM=$_POST['MANHOM'];
            //echo '<br>Mã nhóm: '. $MANHOM;
          }
          else $LOI=1;
          if($_POST["MSHH"]){
            $MSHH=$_POST['MSHH'];
            //echo '<br>Mã số hàng hóa: '. $MSHH;
          }
          else $LOI=1;
          if($_POST["TENHH"]){
            $TENHH=$_POST['TENHH'];
            //echo '<br>Mã số hàng hóa: '. $TENHH;
          }
          else $LOI=1;
          if($_POST["GIA"]){
            $GIA=$_POST['GIA'];
            //echo '<br>Giá: '. $GIA;
          }
          else $LOI=1;
          if($_POST["SOLUONG"]){
            $SOLUONG=$_POST['SOLUONG'];
            //echo '<br>Số lượng: '. $SOLUONG;
          }
          else $LOI=1;
          //echo '<br>'.$duongdan;
          if($_POST["MOTA"]){
            $MOTA=$_POST['MOTA'];
            //echo '<br>Mô tả: '. $MOTA;
          }
          else $LOI=1;
          if($LOI==1){
            echo '<h1 style="text-align:center;float:left;width:100%">LỖI ĐIỀN THIẾU THÔNG TIN !</h1>' ;
          }
          else{
            //xu ly
            $sql = "INSERT INTO hanghoa VALUES('$MSHH','$TENHH',$GIA,$SOLUONG,'$MANHOM','$duongdan','$MOTA')";

            if ($conn->query($sql) === TRUE) {
              echo '<h1 style="text-align:center;float:left;width:100%">ĐĂNG THÀNH CÔNG !</h1>' ;
            }
            else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }

            
          }

          



        } else {
          echo '<h1 style="text-align:center;float:left;width:100%">ĐÃ XẢY RA LỖI !</h1>' ;
        }
      }

      //return $duongdan;

    //}
    //$DUONGDAN=taiHinh("..//public/product-images/");
   

    

    
    echo '
    <form action="themhanghoa.php" method="POST">
    <input class="btnmua" type="submit" href="#themhaghoa" value="QUAY LẠI">
    <input type="hidden" name="CONHANVIEN" value="CONHANVIEN" />
    </form>
    ';
    }
?>
    <?php include "body-footer.php" ?>
    <link rel="stylesheet" href="css/katte.css">
    <script src="javascript/katte.js"></script>
</body>