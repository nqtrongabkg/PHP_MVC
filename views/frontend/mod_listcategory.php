<?php
    use App\Models\Category;
    $agrs_mod_listcat =
    [
        ['status','=',1],
        ['parent_id','=',0]
    ];
    $mod_list_category = Category::where($agrs_mod_listcat)->orderBy('sort_order')->get();
?>

<div class="mod_listcategory">
    <ul class="list-group my-3">
        <li class="list-group-item active text-center" aria-current="true">DANH MỤC SẢN PHẨM</li>
        <?php foreach ($mod_list_category as $mod_row_listcat): ?>
            <li class="list-group-item myHover">
                <a href="index.php?option=product&cat=<?=$mod_row_listcat->slug;?>"><?=$mod_row_listcat->name;?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>