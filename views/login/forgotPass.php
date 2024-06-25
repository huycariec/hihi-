<div class="auth-wrapper">
    <div class="auth-container">
        <div class="auth-action-left">
            <div class="auth-form-outer">
                <h2 class="auth-form-title">
                    Quên Mật Khẩu
                </h2>
                <form class="login-form" method="post" action="index.php?act=forgotPassword">
                    <input name="account" type="text" class="auth-form-input" placeholder="Tên tài khoản">
                    <div class="input-icon">
                        <input name="email" type="text" class="auth-form-input" placeholder="Email">
                    </div>
                    <div class="validation">
                        <?php if (isset($_SESSION['error'])){
                            echo "<span class='validation-error'>". $_SESSION['error'] ."</span>";
                            unset($_SESSION['error']);
                        } ?>
                    </div>
                    <div class="footer-action">
                        <input name="btn-submit" type="submit" value="Gửi" class="auth-submit">
                    </div>
                </form>
                <div class="auth-forgot-password">
                    <a href="index.php?act=login">Đăng Nhập</a>
                </div>
            </div>
        </div>
    </div>
</div>