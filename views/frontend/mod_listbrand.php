<?php
    use App\Models\Brand;
    $mod_list_brand = Brand::where('status','=',1)->orderBy('sort_order')->get();
?>

<div class="mod_listcategory">
    <ul class="list-group my-3">
        <li class="list-group-item active text-center" aria-current="true">THƯƠNG HIỆU</li>
        <?php foreach ($mod_list_brand as $mod_row_listbrand): ?>
            <li class="list-group-item myHover">
                <a href="index.php?option=brand&cat=<?=$mod_row_listbrand->slug;?>"><?=$mod_row_listbrand->name;?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>