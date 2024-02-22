<?php

use App\Libraries\Mystring;
use App\Models\Post;
use App\Models\Topic;
use App\Libraries\Phantrang;

$slug  = $_REQUEST['cat'];
$row_topic = Topic::where([['status','=',1],['slug','=',$slug]])->first();
$args_postcat = [
    ['status','=',1],
    ['type','=','post'],
    ['topic_id','=',$row_topic->id]
];



///xử lý phân trang
$page = $_REQUEST['page'] ?? 1;
$limit = 12;
$offset = ($page - 1) * $limit;
$total = Post::where($args_postcat)->count();//đếm tổng số mẫu tin
$pageNumber = ceil($total/$limit);//tính tổng số trang cần có, làm tròn lên
$pageLink = "";
for($i=1;$i<=$pageNumber;$i++)
{
    $pageLink .= "<a href='index.php?option=product&cat=" . $slug . "&page=$i'>$i</a>";
}
///kết thúc xử lý phân trang

$list_post = Post::where($args_postcat)
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
                <h2><?=$row_topic->name;?></h2>
                <?php foreach($list_post as $post): ?>
                <div class="row">
                    <div class="col-md-4">
                        <a href="index.php?option=post&id=<?=$post->slug;?>">
                            <img class="img-fluid" src="public/images/post/<?=$post->image;?>" alt="<?=$post->image;?>">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <a href="index.php?option=post&id=<?=$post->slug;?>">
                            <h3 class="text-decoration-none"><?=$post->title;?></h3>
                        </a>
                        <p>
                            <?= Mystring::str_limit($post->detail,100); ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
                <div>
                    <?=Phantrang::pageLinks($total,$page,$limit,'index.php?option=post&cat=' . $slug);?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once('./views/frontend/footer.php'); ?>