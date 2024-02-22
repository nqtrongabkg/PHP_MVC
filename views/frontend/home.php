<!--bắt đầu xử lý giao diện người dùng-->
<?php
use App\Models\Category;
use App\Models\Product;
$list_category = Category::where([['status','=',1],['parent_id','=',0]]) -> orderBy('sort_order','ASC') -> get();
?>
<!--kết thúc xử lý giao diện người dùng-->

<?php require_once('./views/frontend/header.php'); ?>
<section class="maincontent">
    <div class="container">
        <?php require_once('views/frontend/mod_slider.php'); ?>
        <!--end slide-->
        <div class="row product-main">
            <div class="col-md-3">
                <?php require_once('views/frontend/mod_listcategory.php'); ?>
                <?php require_once('views/frontend/mod_listbrand.php'); ?>
            </div>
            <!--phân màn 3-9-->

            <div class="col-md-9">

                <?php foreach($list_category as $row_cat): ?>
                <?php
                    $list_category_id = array();
                    array_push($list_category_id,$row_cat->id);
                    $list_category1 = Category::where([['status','=',1],['parent_id','=',$row_cat->id]]) -> get();
                    if(count($list_category1)>0)
                    {
                        foreach($list_category1 as $row_cat1)
                        {
                            array_push($list_category_id,$row_cat1->id);
                            $list_category2 = Category::where([['status','=',1],['parent_id','=',$row_cat1->id]]) -> get();
                            if(count($list_category2)>0)
                            {
                                foreach($list_category2 as $row_cat2)
                                {
                                    array_push($list_category_id,$row_cat2->id);
                                }
                            }
                        }
                    }
                    $product_list = Product::where('status','=',1)->whereIn('category_id',$list_category_id) -> orderBy('created_at','DESC') ->take(8) -> get();
                ?>

                <div>
                    <a href="index.php?option=product&cat=<?= $row_cat->slug; ?>" class="text-decoration-none">
                        <h3
                            class="text-dark myHover bg-mainmenu border border-primary rounded-top mb-0 mt-3 pb-1 text-center">
                            <?=$row_cat->name?>
                        </h3>
                    </a>
                </div>
                <div class="row">
                    <?php foreach($product_list as $product): ?>
                    <div class="col-md-3 mb-3">
                        <div class="card" style="width: 100%;">
                            <a href="index.php?option=product&id=<?= $product->slug?>"><img
                                    src="public\images\product\<?= $product->image?>"
                                    class="card-img-top text-decoration-none" alt="<?= $product->image?>"></a>
                            <div class="card-body text-center">
                                <a href="index.php?option=product&id=<?= $product->slug?>" class="text-decoration-none">
                                    <h5 class="card-title"><?= $product->name ?></h5>
                                </a>
                                <a href="" class="text-decoration-none">Giá: <?= number_format($product->price) ?>đ</a>
                                <div class="row">
                                    <div class="col-4">
                                        <a href="index.php?option=product&id=<?= $product->slug?>" class="btn btn-sm btn-info">Xem</a>
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
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php require_once('./views/frontend/footer.php'); ?>