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

                <td style="float:right">
                    <div>
                        <h3>
                            Xin chào
                            <?php
                            if(!empty($_POST["MSNV"])){
                                $MSNV=$_POST['MSNV'];
                                echo $MSNV;
                            }
                            
                            else if(isset($_COOKIE["MSNV_CK"])){
                                echo $_COOKIE["MSNV_CK"];
                            }
                            
                            ?>
                            !
                        </h3>
                        <a class="dangxuat-btn" href="index.php">
                            ĐĂNG XUẤT
                        </a>
                    </div>
                </td>


            </tr>
        </table>
    </div>
</div>


<!-- <div class="chuchay">
    <marquee>
        Công Ty TNHH MTV KATTE, SỐ 00T, ĐƯỜNG BA THÁNG HAI, NINH KIỀU, CẦN THƠ
    </marquee>
</div> -->