<?php
use App\Models\Post;
$slug = $_REQUEST['id'];
$args_post = [
    ['status','=',1],
    ['type','=','post'],
    ['slug','=',$slug]
];
$row_post = Post::where($args_post)->first();
$args_post_detail = [
    ['status','=',1],
    ['type','=','post'],
    ['id','!=',$row_post->id]
];
$list_post = Post::where($args_post_detail)
->orderBy('created_at','DESC')
->take(9)
->get();
?>

<?php require_once('./views/frontend/header.php'); ?>
<section class="maincontent my-3">
    <div class="container">
        <h1><?= $row_post->title; ?></h1>
        <p><?= $row_post->detail; ?></p>
        <?php if(count($list_post)> 0): ?>
        <h3>Bài viết khác</h3>
        <ul>
            <?php foreach($list_post as $post): ?>
                <li>
                    <a class="text-decoration-none" href="index.php?option=post&id=<?=$post->slug;?>"><?=$post->title;?></a>
                </li>
            <?php endforeach;?>
        </ul>
        <?php endif; ?>
    </div>
</section>
<?php require_once('./views/frontend/footer.php'); ?>