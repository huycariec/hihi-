<?php if(isset($_SESSION['account']) && is_array($_SESSION['account'])){
    extract($_SESSION['account']);
} ?>
<div class="auth-wrapper">
    <h2 class="auth-title">
        Hồ sơ của tôi
    </h2>
    <div class="updateInfo-container">
        <div class="information">
            <div class="auth-updateInfo">
                <form class="login-form" method="post" enctype="multipart/form-data" action="">
                    <div class="inFor">
                        <div>
                            <lable>Tên Tài Khoản: </lable>
                        </div>
                        <div class="inFor_input readonly"><input name="account" readonly type="text"
                                class="form-updateInfo" value="<?=$account?>" placeholder=""></div>
                    </div>
                    <div class="inFor">
                        <div>
                            <lable>Họ Và Tên:</lable>
                        </div>
                        <div><input class="inFor_input" name="name" type="text" class="form-updateInfo"
                                value="<?=$name_user?>" placeholder=""></div>
                    </div>
                    <div class="inFor">
                        <div>
                            <lable>Email:</lable>
                        </div>
                        <div><input class="inFor_input" name="email" type="email" class="form-updateInfo"
                                value="<?=$email?>" placeholder=""></div>
                    </div>
                    <div class="inFor">
                        <div>
                            <lable>Số Điện Thoại:</lable>
                        </div>
                        <div><input class="inFor_input" name="phone" type="text" class="form-updateInfo"
                                value="<?=$phone?>" placeholder=""></div>
                    </div>
                    <div class="inFor">
                        <div>
                            <lable>Mậu Khẩu:</lable>
                        </div>
                        <div><a href="index.php?act=changePassword"><input class="inFor_input" name="pass"
                                    type="password" class="form-updateInfo" value="<?=$password?>" readonly
                                    placeholder=""></a>
                        </div>
                    </div>
                    <div class="inFor">
                        <div>
                            <lable>Địa Chỉ:</lable>
                        </div>
                        <div><input class="inFor_input" name="address" type="text" class="form-updateInfo"
                                value="<?=$address?>" placeholder=""></div>
                    </div>
                    <div style="margin-left: 30px; margin-top: 20px" class="validation">
                        <?php if (isset($_SESSION['error'])){
                            echo "<span class='validation-error'>". $_SESSION['error'] ."</span>";
                            unset($_SESSION['error']);
                        } ?>
                    </div>
                    <div class="footer-updateInfo">
                        <div></div>
                        <input type="hidden" name="id_user" value="<?= $id_user?>">
                        <input name="btn-updateInfo" type="submit" value="Cập Nhật" class="">
                    </div>
            </div>
        </div>
        <div class="img-inFormation">
            <div>
                <?php
                    if($img_user == ""){?>
                <img src="image/user.png" alt="">
                <?php }else{ ?>
                <img src="upload/<?= $img_user ?>" alt="">
                <?php }
                    ?>
                <input name="img" type="file">
            </div>
            </form>
        </div>
    </div>
</div>