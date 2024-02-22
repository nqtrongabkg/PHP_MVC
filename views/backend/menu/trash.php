<?php 
use App\Models\Menu; 
use App\Libraries\MessageArt;

$list = Menu::where('status','=','0')->orderBy('created_at','DESC')->get();
?>

<?php require_once('../views/backend/header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>THÙNG RÁC DANH MỤC</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Thùng rác danh mục</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a class="btn btn-sm btn-info" href="index.php?option=menu">
                        <i class="fas fa-chevron-left"></i> Quay về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">                
            <?php include_once('../views/backend/messageAlert.php'); ?>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:20px;">#</th>
                            <th>Tên danh mục</th>
                            <th>Slug</th>
                            <th class="text-center" style="width:160px;">Ngày tạo</th>
                            <th class="text-center" style="width:200px;">Chức năng</th>
                            <th class="text-center" style="width:20px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $row):?>
                        <tr>
                            <td class="text-center"><input type="checkbox"></td>
                            <td><?= $row['name']?></td>
                            <td><?= $row['slug']?></td>
                            <td class="text-center"><?= $row['created_at']?></td>
                            <td class="text-center">
                                
                                <a class="btn btn-sm btn-primary"
                                    href="index.php?option=menu&cat=restore&id=<?= $row['id']?>">
                                    <i class="fas fa-trash-restore"></i>
                                </a>
                                <a class="btn btn-sm btn-danger"
                                    href="index.php?option=menu&cat=destroy&id=<?= $row['id']?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                            <td class="text-center"><?= $row['id']?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once('../views/backend/footer.php'); ?>