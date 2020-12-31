<?php
    $so = 0;
    $kytu = 0;
    $dacbiet = 0;
    $inhoa = 0;
    $thuong = 0;
    $kytudau=0;
    $f8=1;
    $noidung="";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['tendangnhap'])==true){
            $f1=0;
            $noidung.="Tên đăng nhập rỗng !";
        }
        else $f1=1;
        if(empty($_POST['matkhau'])==true){
            $f2=0;
            $noidung.= "<br>Mật khẩu rỗng !";
        }
        else $f2=1;

        if(empty($_POST['matkhau2'])==true){
            $f3=0;
            $noidung.="<br>Mật khẩu lặp lại rỗng !";
        }
        else $f3=1;

        if(empty($_POST['ten'])==true){
            $f4=0;
            $noidung.="<br>Họ tên rỗng !";
        }
        else $f4=1;

        if(empty($_POST['diachi'])==true){
            $f6=0;
            $noidung.="<br>Địa chỉ rỗng !";
        }
        else $f6=1;

        if(empty($_POST['email'])==true){
            $f5=0;
            $noidung.="<br>Email rỗng !";
        }
        else $f5=1;
        
        if(empty($_POST['sodienthoai'])==true){
            $f7=0;
            $noidung.="<br>Số điện thoại rỗng !";
        }
        else $f7=1;

        for($i=0;$i<strlen($_POST['tendangnhap']);$i++){
            if($_POST['tendangnhap'][$i]==" "){
                $f8=0;
                $noidung.="<br>Có khoảng trống ở tên đăng nhập !";
            }
        }
        if(strlen($_POST['matkhau'])<8 || strlen($_POST['matkhau']>16)){
            $f9=0;
            $noidung.="<br>Mật khẩu trong vòng từ 8 đến 16 ký tự !";
        }
        else $f9=1;
       
        for ($i = 0; $i < strlen($_POST['matkhau']); $i++) {
            if (48 <= ord($_POST['matkhau'][$i]) && ord($_POST['matkhau'][$i]) <= 57) {
                $so++;
            }
            if (65 <= ord($_POST['matkhau'][$i]) && ord($_POST['matkhau'][$i]) <= 122) {
                $kytu++;
            }
            if (65 <= ord($_POST['matkhau'][$i]) && ord($_POST['matkhau'][$i]) <= 90) {
                $inhoa++;
            }
            if (97 <= ord($_POST['matkhau'][$i]) && ord($_POST['matkhau'][$i]) <= 122) {
                $thuong++;
            }
            if (33 <= ord($_POST['matkhau'][$i]) && ord($_POST['matkhau'][$i]) <= 47) {
                $dacbiet++;
            }
            if (91 <= ord($_POST['matkhau'][$i]) && ord($_POST['matkhau'][$i]) <= 96) {
                $dacbiet++;
            }
            if (58 <= ord($_POST['matkhau'][$i]) && ord($_POST['matkhau'][$i]) <= 64) {
                $dacbiet++;
            }

        }
        if ($so == 0 || $kytu == 0 || $dacbiet == 0 || $inhoa == 0 || $thuong == 0) {
            $noidung.="<br>Mật khẩu phải là hoa thường đặc biệt !";
            $f10=0;
        }
        else {
            $f10=1;
        }
        //ky tu dau
        if($f1==1){
            if (65 <= ord($_POST['tendangnhap'][0]) && ord($_POST['tendangnhap'][0]) <= 90) {
                $kytudau = 1;
            }
            if (97 <= ord($_POST['tendangnhap'][0]) && ord($_POST['tendangnhap'][0]) <= 122) {
                $kytudau = 1;
            }
        }
        if ($kytudau != 1) {
            $noidung.="<br>Ký tự đầu phải là chữ !";
            $f11=0;
        }
        else {
            $f11=1;
        }

        if($_POST['matkhau']!=$_POST['matkhau2']){
            $noidung.="<br>Hai trường mật khẩu không giống nhau !";
            $f12=0;
        }
        else $f12=1;
        $pos1 = strpos($_POST['email'],"@");
        if ($pos1===false) {
            $noidung.="<br>Email không hợp lệ !";
            $f13=0;
        }
        // $pos1 = strpos($_POST['email'],$_POST['tendangnhap']."@gmail.com");
        // if ($pos1===false) {
        //     $noidung.="<br>Email có dạng [Tên đăng nhập]+@gmail.com !";
        //     $f13=0;
        // }
        else{
           
            $f13=1;
        }
        if($f1!=0){
            $pos2 =strpos($_POST['matkhau'],$_POST['tendangnhap']);
            if($pos2===false){
                $f14=1;
            }
        }

        else{
            $noidung.="<br>Mật khẩu chứa tên đăng nhập !";
            $f14=0;
        }

        if(strlen($_POST['sodienthoai'])!=10){
            $noidung.="<br>Số điện thoại gồm 10 chữ số !";
            $f15=0;
        }
        else{
            $f15=1;
        }
        //xử lý đăng ký
        if($f1==1 && $f2==1 && $f3==1 && $f4==1 && $f5==1 && $f6==1 && $f7==1 && $f8==1 && $f9==1 && $f10==1 && $f11==1 && $f12==1 && $f13==1 && $f14==1 && $f15==1){
            
            $mk=hash('ripemd160',$_POST['matkhau']);
            
            include "dbConfig.php"; 
            $sql = "INSERT INTO khachhang (MSKH, HoTenKH, DiaChi,SoDienThoai,MatKhau) 
            VALUES ('$_POST[tendangnhap]', '$_POST[ten]', '$_POST[diachi]','$_POST[sodienthoai]','$mk')";

            if ($conn->query($sql) === TRUE) {
                echo "Đã đăng ký thành công !";
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
            $noidung.="<br>Thành công !";
            $dk=1;
        
        
        }
       
    }
?>
<div class="popup" id="popup" style="height:320px">
    <button class="nuttat" style="float:right;"
        onclick="document.getElementById('popup').style.display='none';">X</button>
    <h3>THÔNG BÁO</h3>
    <p class="noidungthongbao"> <?php echo $noidung?> </p>
</div>

<?php include "index.php" ?>
<?php 
if($dk==1){
    setcookie("username",$_POST['tendangnhap']);
    echo'
    <script>
    setCookie("username", "'.$_POST['tendangnhap'].'");

 //   history.back();
    window.onload = function() {
        if (!window.location.hash) {
            window.location = "index.php"; 
            
            
        }
    }
    </script>
';

}
?>