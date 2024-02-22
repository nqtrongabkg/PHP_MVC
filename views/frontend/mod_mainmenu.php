<?php
use App\Models\Menu;

$agrs1 = [
    ["status", "=", 1],
    ["parent_id", "=", 0],
    ["position", "=", "mainmenu"]
];

$list_menu1 = Menu::where($agrs1) -> get();
?>

<nav class="navbar navbar-expand-lg nvarbar-light bg-mainmenu">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">HOME</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <?php foreach($list_menu1 as $menu1): ?>
                <?php
                            $agrs2 = [
                                ["status", "=", 1],
                                ["parent_id", "=", $menu1->id],
                                ["position", "=", "mainmenu"]
                            ];
                            $list_menu2 = Menu::where($agrs2) -> get();
                        ?>
                <?php if(count($list_menu2) != 0): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?= $menu1->name; ?>
                    </a>
                    <ul class="dropdown-menu bg-mainmenu">
                        <?php foreach($list_menu2 as $menu2): ?>
                        <li><a class="dropdown-item border-bottom" href="<?= $menu2->link; ?>"><?= $menu2->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php else: ?>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= $menu1->link; ?>"><?= $menu1->name; ?></a>
                    </li>
                <?php endif; ?> 
                <?php endforeach; ?>
                
            </ul>
        </div>
    </div>
</nav>