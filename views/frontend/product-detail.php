<?php
use App\Models\Product;
use App\Models\Category;
$slug = $_REQUEST['id'];
$row_product = Product::where([['status','=',1],['slug','=',$slug]])->first();

//lấy ra sản phẩm cung loại
$list_category_id = array();
array_push($list_category_id,$row_product->category_id);
$list_category1 = Category::where([['status','=',1],['parent_id','=',$row_product->category_id]]) -> get();
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
$product_list = Product::where([['status','=',1],['id','!=',$row_product->id]])->whereIn('category_id',$list_category_id) 
->orderBy('created_at','DESC') 
->take(8)
->get();
//kết thúc lấy ra sản phẩm cùng loại
?>

<?php require_once('./views/frontend/header.php'); ?>
<form action="index.php?option=cart&addcat=<?=$row_product->id;?>" method="post">
    <section class="maincontent">
        <div class="container">
            <div class="row product_header">
                <div class="col-md-6 mb-5 border-bottom border-primary">
                    <img src="public\images\product\<?= $row_product->image?>" class="img-fluid w-100"
                        alt="<?= $row_product->name?>">
                </div>
                <div class="col-md-6">
                    <h1 class="product_name my-5 text-center"><?= $row_product->name?></h1>
                    <div class="product_price">
                        <h2>Giá: <?= number_format($row_product->price);?>đ</h2>
                    </div>
                    <div class="input-group mb-3">
                        <input name="qty" type="number" value="1" aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        <button name="ADDCART" type="submit" class="input-group-text" id="basic-addon2">Mua</button>
                    </div>
                </div>
            </div>
            <div class="row product_detail">
                <div class="col-md-12 border border-info">
                    <h2>Thông tin sản phẩm:</h2>
                    <div class="border-top">
                        <p><?=$row_product->detail;?></p>
                    </div>
                </div>
            </div>
            <div class="row product_other">
                <h3 class="bg-mainmenu border border-primary rounded-top mb-0 mt-3 text-center">
                    Sản phẩm liên quan
                </h3>
                <?php foreach($product_list as $product): ?>
                <div class="col-md-3 mb-3">
                    <div class="card" style="width: 100%;">
                        <a href="index.php?option=product&id=<?= $product->slug?>">
                            <img src="public\images\product\<?= $product->image?>" class="card-img-top"
                                alt="..."></a>
                        <div class="card-body text-center">
                            <a href="index.php?option=product&id=<?= $product->slug?>">
                                <h5 class="card-title"><?= $product->name ?></h5>
                            </a>
                            <a href="">Giá: <?= number_format($product->price) ?>đ</a>
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
        </div>
    </section>
</form>
<?php require_once('./views/frontend/footer.php'); ?>