<div class="auth-wrapper">
    <div class="auth-container">
        <div class="auth-action-left">
            <div class="auth-form-outer">
                <h2 class="auth-form-title">
                    Mã Xác Nhận
                </h2>
                <form class="login-form" method="post" action="index.php?act=checkCode">
                    <input name="code" type="text" class="auth-form-input" placeholder="Nhập mã xác nhận">
                    <div class="validation">
                        <?php if (isset($_SESSION['error'])){
                            echo "<span class='validation-error'>". $_SESSION['error'] ."</span>";
                            unset($_SESSION['error']);
                        } ?>
                    </div>
                    <div class="footer-action">
                        <input name="check" type="submit" value="Gửi" class="auth-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>