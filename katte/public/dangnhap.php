<?php
    $username="";
    $password="";
    $noidung="";
    if($_POST["tendangnhap"]){
       $username=$_POST['tendangnhap'];
    }
    if($_POST["matkhau"]){
        $password=$_POST['matkhau'];
     }
    $password=hash('ripemd160',$password);
    $ketquadangnhap=0;
    include "dbConfig.php"; 
    $sql = "SELECT MSKH,MatKhau FROM khachhang";

    $result = $conn->query($sql);
    if($result->num_rows>0){
   
        while($row = $result->fetch_assoc()){
            
            if($row['MSKH']==$username and $row['MatKhau']==$password){
                $ketquadangnhap=1;
                break;        
            }
        }
    
    
    }

$conn->close();
    if($ketquadangnhap==0){
        $noidung.="Sai tên đăng nhập hoặc mật khẩu";
    }


?>
<div class="popup" id="popup">
    <button class="nuttat" style="float:right;"
        onclick="document.getElementById('popup').style.display='none';">X</button>
    <h3>THÔNG BÁO</h3>
    <p class="noidungthongbao">

        <?php if($ketquadangnhap==1)
                {
                    echo 'Thành công !';          
                }
            else{
                echo $noidung;}
        ?>
    </p>
</div>

<?php include "index.php" ?>
<?php 
if($ketquadangnhap==1){
    setcookie("username",$_POST['tendangnhap']);
    echo'
    <script>
    setCookie("username", "'.$_POST['tendangnhap'].'");
    
    //history.back();

    window.onload = function() {
        if (!window.location.hash) {
            window.location = "index.php"; 
            
            
        }
    }
    </script>
';

}

?>