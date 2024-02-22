<link rel="stylesheet" href="../../public/css/layoutsite.css">
<?php require_once('./views/frontend/header.php'); ?>

<?php
    use App\Models\User;
    if(isset($_POST['DANGNHAP']))
    {
        $message_alert = "";
        $username = $_POST['username'];
        $password = sha1($_POST['password']);
        $args = null;
        if (filter_var($username, FILTER_VALIDATE_EMAIL))
        {
            $args = [
                ['email','=',$username],
                ['password','=',$password],
                ['status','=',1]
            ];
        }
        else
        {
            $args = [
                ['username','=',$username],
                ['password','=',$password],
                ['status','=',1]
            ];
        }
        
        $user = User::where($args)->first();
        if($user != null)
        {
           $_SESSION['logincustomer'] = $username;
           $_SESSION['user_id'] = $user->id;
           $message_alert = "Đăng nhập thành công";
        }
        else
        {
            $message_alert = "Tài khoản không chính xác";
        }
    }
?>

<section class="maincontent">
    <form action="index.php?option=customer&f=login" method="POST">
        <div class="container">
            <div class="row my-3">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <h3 class="text-center bg-mainmenu py-2">Đăng Nhập</h3>
                    <?php if(!isset($_SESSION['logincustomer'])): ?>
                    <div class="mb-3">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" placeholder="Tên đăng nhập hoặc email"
                            class="form-control" require>
                    </div>
                    <div class="mb-3">
                        <label for="password">Mật Khẩu</label>
                        <input type="password" name="password" id="password" placeholder="Mật khẩu đăng nhập"
                            class="form-control" require>
                    </div>
                    <div class="mb-3">
                        <input name="DANGNHAP" type="submit" class="btn btn-info" value="ĐĂNG NHẬP">
                        <input name="DANGKY" type="submit" class="btn btn-info" value="ĐĂNG KÝ">
                        <a href="#" class="align-bottom text-decoration-none">Quên mật khẩu!</a>
                    </div>
                    <?php else: ?>
                    <div class="mb-3">
                        <div class="alert alert-info text-center">
                            Đã đăng nhập
                        </div>
                        <div class="alert alert-info text-center myHover">
                            <a class="nav-link" href="index.php?option=customer&f=logout" role="button">
                                Đăng xuất
                            </a>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php if(isset($message_alert)): ?>
                    <div class="mb-3">
                        <div class="alert alert-info text-center">
                            <?= $message_alert; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </form>
</section>
<?php require_once('./views/frontend/footer.php'); ?>