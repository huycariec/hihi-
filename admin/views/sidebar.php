<div class="col-1-admin">
    <div class="information-admin">
        <img src="../upload/<?= $_SESSION['account']['img_user']; ?>" alt="">
        <?php if(isset($_SESSION['account']['name_user'])){ ?>
        <h3><?= $_SESSION['account']['name_user']; ?></h3>
        <?php }else{ ?>
        <h3><?= $_SESSION['account']['account']; ?></h3>
        <?php } ?>

        <div class="line-admin"></div>
    </div>
    <div class="function-admin">
        <ul>
            <li>
                <i class="fa-solid fa-house" style="color: #ffffff;"></i><a
                    href="../../../ProjectOne/index.php?act=home">Trang
                    Chủ</a>
            </li>
            <li>
                <i class="fa-solid fa-list-check" style="color: #ffffff;"></i><a href="index.php?act=listCategory">Quản
                    Lí
                    Danh Mục</a>
            </li>
            <li><i class="fa-solid fa-bag-shopping" style="color: #ffffff;"></i><a href="index.php?act=listProduct">Quản
                    Lí
                    Hàng Hoá</a>
            </li>
            <li><i class="fa-solid fa-people-roof" style="color: #ffffff;"></i><a href="index.php?act=listUser">Quản Lí
                    Khách Hàng</a>
            </li>
            <li>
                <i class="fa-solid fa-comment" style="color: #fafafa;"></i><a href="index.php?act=listComment">Quản Lí
                    Bình
                    Luận</a>
            </li>
            <li>
                <i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i><a
                    href="index.php?act=listOrders">Quản Lí Đơn Hàng</a>
            </li>
            <li>
                <i class="fa-solid fa-chart-simple" style="color: #ffffff;"></i><a
                    href="index.php?act=statistical">Thống
                    kê</a>
            </li>
            <!--            <li>-->
            <!--                <i class="fa-solid fa-user" style="color: #ffffff;"></i><a href="">Tài khoản</a>-->
            <!--            </li>-->
        </ul>
    </div>
    <div class="logout-container">
        <form action="" method="post">
            <button class="logout" type="submit"><a href="../index.php?act=logout">Đăng Xuất</a></button>
        </form>
    </div>
</div>