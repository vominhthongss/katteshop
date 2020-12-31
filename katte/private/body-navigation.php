<div class="nav">

    <!-- <a href="donhangchoduyet.php">
        ĐƠN HÀNG CHỜ DUYỆT
    </a> -->
    <!-- <a href="themhanghoa.php">
        THÊM SẢN PHẨM
    </a> -->

    <form action="donhangchoduyet.php" method="POST">
        <a href="#donhangchoduyet" onclick="parentNode.submit()">ĐƠN HÀNG CHỜ DUYỆT</a>
        <input type="hidden" name="CONHANVIEN" value='CONHANVIEN' />
    </form>
    <form action="themhanghoa.php" method="POST">
        <a href="#themhanghoa" onclick="parentNode.submit()">THÊM HÀNG HÓA</a>
        <input type="hidden" name="CONHANVIEN" value='CONHANVIEN' />
    </form>

</div>