<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../../model/PDO.php';
include '../../model/comment.php';
$id_product = $_REQUEST['id_product'];
$list = select_user_comment($id_product);
$count_comment = coutn_comment($id_product);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<div class="comment-container">
    <?php if (isset($_SESSION['account'])) {?>
        <img src="image/user.png" alt="">
        <div class="comment-form">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <div id="comment-form">
                    <input type="hidden" name="id_product" value="<?php echo $id_product ?>">
                    <input name="content-comment" id="comment_input" placeholder="    Nhập bình luận của bạn..." type="text">
                </div>
                <div id="btn-comment">
                    <button name="btn-submit" class="btn-comment" type="submit">Gửi</button>
                </div>
            </form>
        </div>
    <?php } else { ?>
        <p><a href="index.php?act=login">Đăng nhập</a> để bình luận.</p>
    <?php } ?>
</div>

<div class="list-comment">
    <h4><?php echo $count_comment ?> Bình luận</h4>
    <div class="line-deltail"></div>
    <div id="comment-section">
        <?php
        foreach ($list as $comment) {
            extract($comment);
            echo '
                        <div class="comment">
            <div class="content-comment">';
                if(isset($img_user)){
                    echo' <img src="upload/'.$img_user.'" alt="">';
                }else{
                    echo ' <img src="image/user.png" alt="">';
                };

                if(isset($name_user)){
                    echo '<h4>'.$name_user.'</h4>';
                }else{
                    echo '<h4>'.$account.'</h4>';
                }
            echo '
            </div>
            <p>' . $content . '</p>
        </div>            
            ';
        }
        ?>
    </div>
    <?php
    if (isset($_POST['btn-submit'])) {
        $content = $_POST['content-comment'];
        $id_user = $_SESSION['account']['id_user'];
        $id_product = $_POST['id_product'];
        $date_comment = date("h:i:sa Y/m/d");
        insert_comment($id_user,$id_product,$date_comment,$content);
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
    ?>
</div>
</body>
</html>