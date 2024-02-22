<?php

use App\Libraries\Mystring;
use App\Models\Post;
use App\Libraries\Phantrang;

$args_post = [
    ['status','=',1],
    ['type','=','post']
];

///xử lý phân trang
$page = $_REQUEST['page'] ?? 1;
$limit = 12;
$offset = ($page - 1) * $limit;
$total = Post::where($args_post)->count();//đếm tổng số mẫu tin
$pageNumber = ceil($total/$limit);//tính tổng số trang cần có, làm tròn lên
$pageLink = "";
for($i=1;$i<=$pageNumber;$i++)
{
    $pageLink .= "<a href='index.php?option=post&cat=" . $i . "&page=$i'>$i</a>";
}
///kết thúc xử lý phân trang

$list_post = Post::where($args_post)
->orderBy('created_at','DESC')
->skip($offset)
->take($limit)
->get();
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
                <h2>TẤT CẢ BÀI VIẾT</h2>
                <?php foreach($list_post as $post): ?>
                <div class="row">
                    <div class="col-md-4">
                        <a class="text-decoration-none" href="index.php?option=page&cat=<?=$post->slug;?>">
                            <img class="img-fluid" src="public/images/post/<?=$post->slug;?>" alt="<?=$post->slug;?>">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <a class="text-decoration-none" href="index.php?option=page&cat=<?=$post->slug;?>">
                            <h3><?=$post->title;?></h3>
                        </a>
                        <p>
                            <?= Mystring::str_limit($post->detail,100); ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
                <div>
                    <?=Phantrang::pageLinks($total,$page,$limit,'index.php?option=post');?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once('./views/frontend/footer.php'); ?>