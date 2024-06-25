<div class="auth-wrapper">
    <div class="auth-container">
        <div class="auth-action-left">
            <div class="auth-form-outer">
                <h2 class="auth-form-title">
                    Đổi mật khẩu
                </h2>
                <form class="login-form" method="post" action="index.php?act=changePassword">
                    <input name="pass" type="password" class="auth-form-input" placeholder="Nhập mật khẩu">
                    <input name="newPass" type="password" class="auth-form-input" placeholder="Nhập mật khẩu mới ">
                    <div class="validation">
                        <?php if (isset($_SESSION['error'])){
                            echo "<span class='validation-error'>". $_SESSION['error'] ."</span>";
                            unset($_SESSION['error']);
                        } ?>
                    </div>
                    <div class="footer-action">
                        <input name="btn-submit" type="submit" value="Đổi mật khẩu" class="auth-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
