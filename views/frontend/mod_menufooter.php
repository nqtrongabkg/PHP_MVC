<?php
use App\Models\Menu;

$agrs_footer = [
    ["status", "=", 1],
    ["position", "=", "footermenu"]
];


$list_menu_footer = Menu::where($agrs_footer) -> get();

?>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15674.548258510302!2d106.78245435!3d10.839061800000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752701a34a5d5f%3A0x30056b2fdf668565!2zVHLGsOG7nW5nIENhbyDEkOG6s25nIEPDtG5nIFRoxrDGoW5nIFRQLkhDTQ!5e0!3m2!1svi!2s!4v1669286634203!5m2!1svi!2s"
                class="img-fluid" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-md-4">
            <h4>AROG COMPUTER</h4>
            <i class="fas fa-map-marker-alt"></i>123 Hoàng Diệu - Linh Trung - Thủ Đức - tpHCM
            <br>
            <i class="fas fa-phone"></i>Hotline: 1900 9090
            <br>
            <i class="fas fa-envelope"></i>Email: arogcomputer@gmail.com
            <br>
            <i class="fab fa-facebook-square"></i>Facebook: arog computer
        </div>

        <div class="col-md-3">
            <h4>VỀ CHÚNG TÔI</h4>
            <ul>
                <?php foreach($list_menu_footer as $row_menu_footer): ?>
                <li><a class="text-decoration-none text-dark hoverText"
                        href="<?=$row_menu_footer->link;?>"><?=$row_menu_footer->name;?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-3">
            <h4>CAM KẾT</h4>
            <p>
                Với tiêu chí mang lại trãi nghiệm tốt nhất cho khách hàng, chúng tôi luôn cố gắn mang đến
                khách hàng những sản phẩm
                phù hợp với nhu cầu sử dụng, chất lượng sản phẩm tốt nhất, sữa chữa, bảo hành chu đáo
                đến khách hàng.
            </p>
        </div>
    </div>
</div>