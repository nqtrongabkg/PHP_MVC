<?php

use App\Models\Product;

if(!isset($_SESSION['logincustomer']))
{
    header('location:index.php?option=customer&f=login');
}

$content_cart = null;
if(isset($_SESSION['contentcart']))
{
    $content_cart = $_SESSION['contentcart'];
}
?>

<?php require_once('./views/frontend/header.php'); ?>
<form action="index.php?option=cart&checkoutCart=true" method="post">
    <section class="maincontent">
        <div class="container">
            <div class="row mt-2">
                <div class="col-md-9">
                    <h4 class="text-center">GIỎ HÀNG</h4>
                    <?php if($content_cart != null): ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Id</th>
                            <th style="width:100px">Hình</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php $total_money = 0; ?>
                        <?php foreach($content_cart as $cart): ?>
                        <?php $product = Product::find($cart['id']); ?>
                        <tr>
                            <td><?= $cart['id']; ?></td>
                            <td>
                                <img src="public\images\product\<?= $product->image?>"
                                    class="card-img-top text-decoration-none" alt="<?= $product->image?>">
                            </td>
                            <td><?= $product->name; ?></td>
                            <td><?= number_format($cart['price']) . "đ"; ?></td>
                            <td>
                                <?=$cart['qty'];?>
                            </td>
                            <td><?= number_format($cart['amount']) . "đ";?></td>
                        </tr>
                        <?php $total_money += $cart['amount']; ?>
                        <?php endforeach; ?>
                    </table>
                    <?php else: ?>
                    <h4 class="text-center">Chưa có sản phẩm trong giỏ</h4>
                    <?php endif; ?>
                </div>
                <div class="col-md-3 text-center">
                    <h6>THÔNG TIN NGƯỜI NHẬN</h6>
                    <div class="mb-3">
                        <input name="deliveryname" type="text" class="form-control" placeholder="Họ tên người nhận">
                    </div>
                    <div class="mb-3">
                        <input name="deliveryaddress" type="text" class="form-control" placeholder="Địa chỉ người nhận">
                    </div>
                    <div class="mb-3">
                        <input name="deliveryphone" type="text" class="form-control" placeholder="Số điện thoại người nhận">
                    </div>
                    <div class="mb-3">
                        <input name="deliveryemail" type="text" class="form-control" placeholder="Email người nhận">
                    </div>
                    <button type="submit" class="mb-3">THANH TOÁN</button>
                </div>
            </div>
        </div>
    </section>
</form>
<?php require_once('./views/frontend/footer.php'); ?>