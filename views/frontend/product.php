<?php
use App\Models\Product;
use App\Libraries\Phantrang;

//Phân trang
$limit = 4;
$page = Phantrang::pageCurrent();
$offset = Phantrang::pageOffset($page, $limit);
$total = Product::where('status','=',1) -> count();

$list_product = Product::where('status','=',1)
-> skip($offset)
-> take($limit)
-> orderBy('created_at','DESC') 
-> get();
?>


<?php require_once('./views/frontend/header.php'); ?>

<section class="maincontent my-3">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            <?php require_once('views/frontend/mod_listcategory.php'); ?>
            <?php require_once('views/frontend/mod_listbrand.php'); ?>
            </div>
            <div class="col-md-9">
                <h2 class="text-center bg-info">TẤT CẢ SẢN PHẨM</h2>
                <div class="row mb-3">
                    <?php foreach($list_product as $product): ?>
                    <div class="col-md-3 mt-2">
                        <div class="product-item border">
                            <div class="product-image">
                                <a href="index.php?option=product&id=<?= $product->id?>" class="text-decoration-none">
                                    <img class="img-fluid" src="public/images/product/<?= $product->image; ?>"
                                        alt="<?= $product->image; ?>">
                                </a>
                            </div>
                            <div class="product-name text-center">
                                <a href="index.php?option=product&id=<?= $product->id?>"class="text-decoration-none">
                                    <h5 class="card-title"><?= $product->name ?></h5>
                                </a>
                            </div>
                            <div class="product-price-cart text-center mb-1">
                                <a href="">Giá: <?= number_format($product->price) ?>đ</a>
                                <div class="row">
                                    <div class="col-4">
                                        <a href="" class="btn btn-sm btn-info">Mua</a>
                                    </div>
                                    <div class="col-8">
                                        <a href="index.php?option=cart&addcat=<?= $product->id?>"
                                            class="btn btn-sm btn-info">Thêm vào giỏ
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div><?= Phantrang::pageLinks($total, $page, $limit, 'index.php?option=product'); ?></div>
            </div>
        </div>
    </div>
</section>


<?php require_once('./views/frontend/footer.php'); ?>