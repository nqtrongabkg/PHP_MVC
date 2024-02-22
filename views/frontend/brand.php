<?php
use App\Models\Product;
use App\Libraries\Phantrang;

///xử lý phân trang
$page = $_REQUEST['page'] ?? 1;
$limit = 12;
$offset = ($page - 1) * $limit;
$total = Product::where('status','=',1)->count();//đếm tổng số mẫu tin
///kết thúc xử lý phân trang

$product_list = Product::where('status','=',1)
->orderBy('created_at','DESC')
->skip($offset)
->take($limit) 
->get();
?>

<?php require_once('./views/frontend/header.php'); ?>
<section class="maincontent">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php require_once('views/frontend/mod_listcategory.php'); ?>
                <?php require_once('views/frontend/mod_listbrand.php'); ?>
            </div>
            <div class="col-md-9">
                <h3 class="bg-mainmenu border border-primary rounded-top mb-0 mt-3 text-center">Tất cả Thương hiệu</h3>
                <div class="row">
                    <?php foreach($product_list as $product): ?>
                    <div class="col-md-3 mb-3">
                        <div class="card" style="width: 100%;">
                            <a href="index.php?option=product&id=<?= $product->slug?>"><img
                                    src="public\images\product\<?= $product->image?>" class="card-img-top"
                                    alt="..."></a>
                            <div class="card-body text-center">
                                <a href="index.php?option=product&id=<?= $product->slug?>" class="text-decoration-none">
                                    <h5 class="card-title"><?= $product->name ?></h5>
                                </a>
                                <a class="text-decoration-none" href="">Giá: <?= number_format($product->price) ?>đ</a>
                                <div class="row">
                                    <div class="col-4">
                                        <a href="" class="btn btn-sm btn-info">Mua</a>
                                    </div>
                                    <div class="col-8">
                                        <a href="index.php?option=cart&addcat=<?= $product->id?>"
                                            class="btn btn-sm btn-info">Thêm vào giỏ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div>
                    <div><?= Phantrang::pageLinks($total, $page, $limit, 'index.php?option=brand'); ?></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once('./views/frontend/footer.php'); ?>