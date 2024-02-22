<?php
use App\Models\Category;
use App\Models\Product;
use App\Libraries\Phantrang;
$slug  = $_REQUEST['cat'];
$row_cat = Category::where([['status','=',1],['slug','=',$slug]])->first();

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

///xử lý phân trang
$page = $_REQUEST['page'] ?? 1;
$limit = 4;
$offset = ($page - 1) * $limit;
$total = Product::where('status','=',1)->whereIn('category_id',$list_category_id)->count();//đếm tổng số mẫu tin
$pageNumber = ceil($total/$limit);//tính tổng số trang cần có, làm tròn lên
$pageLink = "";
for($i=1;$i<=$pageNumber;$i++)
{
    $pageLink .= "<a href='index.php?option=product&cat=" . $slug . "&page=$i'>$i</a>";
}
///kết thúc xử lý phân trang
$product_list = Product::where('status','=',1)->whereIn('category_id',$list_category_id) 
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
                <h3 class="bg-mainmenu border border-primary rounded-top mb-0 mt-3 text-center">
                    <?=$row_cat->name?>
                </h3>
                <div class="row">
                    <?php foreach($product_list as $product): ?>
                    <div class="col-md-3 mb-3">
                        <div class="card" style="width: 100%;">
                            <a href="index.php?option=product&id=<?= $product->slug?>">
                                <img src="public\images\product\<?= $product->image?>" class="card-img-top"
                                    alt="..."></a>
                            <div class="card-body text-center">
                                <a href="index.php?option=product&id=<?= $product->slug?>" class="text-decoration-none">
                                    <h5 class="card-title"><?= $product->name ?></h5>
                                </a>
                                <a href="" class="text-decoration-none">Giá: <?= number_format($product->price) ?>đ</a>
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
                    <div><?= Phantrang::pageLinks($total, $page, $limit, 'index.php?option=product&cat='.$slug); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once('./views/frontend/footer.php'); ?>