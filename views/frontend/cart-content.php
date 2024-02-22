<?php

use App\Models\Product;

$content_cart = null;
if(isset($_SESSION['contentcart']))
{
    $content_cart = $_SESSION['contentcart'];
}
?>

<?php require_once('./views/frontend/header.php'); ?>
<form action="index.php?option=cart" method="post">
    <section class="maincontent">
        <div class="container">
            <h2 class="text-center">GIỎ HÀNG</h2>
            <?php if($content_cart != null): ?>
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th style="width:100px">Hình</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Xóa</th>
                </tr>
                <?php $total_money = 0; ?>
                <?php foreach($content_cart as $cart): ?>
                <?php $product = Product::find($cart['id']); ?>
                <tr>
                    <td><?= $cart['id']; ?></td>
                    <td>
                        <img src="public\images\product\<?= $product->image?>" class="card-img-top text-decoration-none"
                            alt="<?= $product->image?>">
                    </td>
                    <td><?= $product->name; ?></td>
                    <td><?= number_format($cart['price']) . "đ"; ?></td>
                    <td>
                        <input style="width: 60px;" min=1 type="number" name="qty[<?= $cart['id'];?>]" value="<?=$cart['qty'];?>">
                    </td>
                    <td><?= number_format($cart['amount']) . "đ";?></td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-danger" href="index.php?option=cart&delcart=<?= $cart['id']; ?>"><i
                                class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php $total_money += $cart['amount']; ?>
                <?php endforeach; ?>
                <tr>
                    <th colspan="4">
                        <a class="btn btn-sm btn-danger" href="index.php?option=cart&delcart=all">Xóa tất cả</a>
                        <input type="submit" name="updateCart" class="btn btn-sm btn-info" value="Cập nhật">
                        <a class="btn btn-sm btn-success" href="index.php?option=cart&checkout=true">Thanh toán</a>
                    </th>
                    <th colspan="3" class="text-end">
                        <strong>TỔNG TIỀN: <?= number_format($total_money) . "đ";?> </strong>
                    </th>
                </tr>
            </table>
            <?php else: ?>
            <h4 class="text-center">Chưa có sản phẩm trong giỏ</h4>
            <?php endif; ?>
        </div>
    </section>
</form>
<?php require_once('./views/frontend/footer.php'); ?>