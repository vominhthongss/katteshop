<div class="gim">
    <div class="header">
        <table style="width: 100%;">
            <tr>
                <td>
                    <div class="tenshop">
                        <img src="images/logoshop.png" style="width: 50px; margin-left: -8px;">
                        <div class="fb">
                            <div class="tenshop-name">
                                <a href="https://www.facebook.com/SS.VMThong/">
                                    <img src="images/facebook.png">

                                    Katte Shop
                                </a>
                            </div>
                        </div>
                    </div>

                </td>

                <td>
                    <div class="customer">
                        <a style="cursor:pointer;" onclick="dangNhap()" id="dangnhap">
                            ĐĂNG NHẬP
                        </a>
                        |
                        <a id="dangky" style="cursor:pointer;" onclick="dangKy()">
                            ĐĂNG KÝ
                        </a>
                        <a id="dangxuat" style="cursor:pointer;"
                            onclick="xoaCookie();window.location.reload();setcookie('username','');">
                            ĐĂNG XUẤT
                        </a>
                        <!-- <input type="button" value="Đăng xuất" onClick="xoaCookie();window.location.reload();"> -->
                        <br>
                        <div class="bill">
                            <a href="giohang.php"><img src="images/basket.png"></a>
                        </div>
                        <div class="bill">
                            <!-- <a href="hoadonkh.php"><img src="images/bill.png"></a> -->
                            <a href="hoadondadat.php"><img src="images/bill.png"></a>


                        </div>

                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="loginform" id="loginform">
    <button class="nuttat" onclick="tatFormDN()">
        X
    </button>
    <h3>ĐĂNG NHẬP</h3>
    <form action="dangnhap.php" class="loginform-content" method="POST">
        <div>
            <p>Tên đăng nhập: </p>
            <input class="onhap" id="tendangnhap" name="tendangnhap" type="text">
            <p>Password: </p>
            <input class="onhap" id="matkhau" name="matkhau" type="password">
            <br>
            <br>
            <button class="nutdkdn" type="submit">Đăng nhập</button>
        </div>
    </form>
</div>
<div class="regisform" id="regisform">
    <button class="nuttat" onclick="tatFormDK()">
        X
    </button>
    <h3>ĐĂNG KÝ</h3>
    <form action="dangky.php" class="regisform-content" method="POST">
        <div>
            <p>Tên đăng nhập(*): </p>
            <input class="onhap" id="tendangnhap" name="tendangnhap" type="text">
            <p>Password(*): </p>
            <input class="onhap" id="matkhau" name="matkhau" type="password">
            <p>Nhập lại password(*): </p>
            <input class="onhap" id="matkhau2" name="matkhau2" type="password">
            <p>Họ tên(*): </p>
            <input class="onhap" id="ten" name="ten" type="text">
            <p>Địa chỉ (*):</p>
            <input class="onhap" id="diachi" name="diachi" type="text">
            <p>Email(*): </p>
            <input class="onhap" id="email" name="email" type="text">
            <p>Số điện thoại(*): </p>
            <input class="onhap" id="sodienthoai" name="sodienthoai" type="number">
            <br>
            <br>
            <button class="nutdkdn" type="submit">Đăng ký</button>
        </div>
    </form>

</div>

<script src="javascript/xulydangnhap.js">

</script>
<div class="chuchay">
    <marquee>
        Công Ty TNHH MTV KATTE, SỐ 00T, ĐƯỜNG BA THÁNG HAI, NINH KIỀU, CẦN THƠ
    </marquee>
</div>