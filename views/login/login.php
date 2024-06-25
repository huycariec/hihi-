<div class="auth-wrapper">
    <div class="auth-container">
        <div class="auth-action-left">
            <div class="auth-form-outer">
                <h2 class="auth-form-title">
                    Đăng nhập
                </h2>
                <div class="auth-external-container">
                    <div class="auth-external-list">
                        <ul>
                            <li><a href="#"><i class="fa fa-google"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <p class="auth-sgt">hoặc:</p>
                </div>
                <form class="login-form" method="post" action="index.php?act=login">
                    <input name="account" type="text" class="auth-form-input" placeholder="Tên tài khoản">
                    <div class="input-icon">
                        <input name="password" type="password" class="auth-form-input" placeholder="Mật khẩu">
                    </div>
                    <div class="validation">
                        <?php if (isset($_SESSION['error'])){
                            echo "<span class='validation-error'>". $_SESSION['error'] ."</span>";
                            unset($_SESSION['error']);
                        } ?>
                    </div>
                    <div class="footer-action">
                        <input name="btn-login" type="submit" value="Đăng nhập" class="auth-submit">
                        <a href="index.php?act=register" class="auth-btn-direct">Đăng kí</a>
                    </div>
                </form>
                <div class="auth-forgot-password">
                    <a href="index.php?act=forgotPassword">Quên mật khẩu</a>
                </div>
            </div>
        </div>
    </div>
</div>
