<?php 
use App\Models\Product; 
use App\Libraries\MessageArt;

$list = Product::join('category','category.id','product.category_id')
->join("brand","brand.id","product.brand_id")
->where("product.status",'=','0')
->orderBy('product.created_at','DESC')
->select("product.*","category.name as category_name","brand.name as brand_name")
->get();
?>

<?php require_once('../views/backend/header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>THÙNG RÁC SẢN PHẨM</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Thùng rác sản phẩm</li>
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
                        <a class="btn btn-sm btn-info" href="index.php?option=product">
                        <i class="fas fa-chevron-left"></i> Quay về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">                
            <?php include_once('../views/backend/messageAlert.php'); ?>

                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:20px;">#</th>
                            <th class="text-center" style="width:90px;">Hình</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Thương hiệu</th>
                            <th class="text-center" style="width:160px;">Ngày tạo</th>
                            <th class="text-center" style="width:200px;">Chức năng</th>
                            <th class="text-center" style="width:20px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $row):?>
                        <tr>
                            <td class="text-center"><input type="checkbox"></td>
                            <td>
                                <img class="img-fluid" src="../public/images/product/<?= $row->image; ?>" alt="<?= $row->image; ?>">
                            </td>
                            <td><?= $row['name']?></td>
                            <td><?= $row['category_name']?></td>
                            <td><?= $row['brand_name']?></td>
                            <td class="text-center"><?= $row['created_at']?></td>
                            <td class="text-center">
                                
                                <a class="btn btn-sm btn-primary"
                                    href="index.php?option=product&cat=restore&id=<?= $row['id']?>">
                                    <i class="fas fa-trash-restore"></i>
                                </a>
                                <a class="btn btn-sm btn-danger"
                                    href="index.php?option=product&cat=destroy&id=<?= $row['id']?>">
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
            <div class="row">
                    <div class="col-md-12 text-right">
                        <a class="btn btn-sm btn-info" href="index.php?option=product">
                        <i class="fas fa-chevron-left"></i> Quay về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

<?php require_once('../views/backend/footer.php'); ?>