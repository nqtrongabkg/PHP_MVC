<?php
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Libraries\MessageArt;
$list_category = Category::where('status', '!=', '0') -> get();
$list_brand = Brand::where('status', '!=', '0') -> get();
$html_category_id = '';
$html_brand_id = '';
foreach($list_category as $category)
{
    $html_category_id .= "<option value='" .$category->id ."'>" .$category->name ."</option>";
}
foreach($list_brand as $brand)
{
    $html_brand_id .= "<option value='" .$brand->id ."'>" .$brand->name ."</option>";
}
?>

<?php require_once('../views/backend/header.php'); ?>

<form action="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>THÊM SẢN PHẨM</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Thêm sản phẩm</li>
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
                            <button name="THEM" type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i> Lưu[Thêm]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=product">
                                <i class="fas fa-chevron-left"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php include_once('../views/backend/messageAlert.php'); ?>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-4">
                                <label for="name">Tên danh mục</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="mb-4">
                                <label for="detail">Mô tả sản phẩm</label>
                                <textarea name="detail" id="detail" class="form-control" required></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="metadesc">Mô tả (SEO)</label>
                                <textarea name="metadesc" id="metadesc" class="form-control" required></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="metakey">Từ khóa (SEO)</label>
                                <textarea name="metakey" id="metakey" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-9">
                                <div class="mb-4">
                                    </select>
                                    <label for="category_id">Danh mục</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="">--Chọn Danh mục--</option>
                                        <?= $html_category_id; ?>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    </select>
                                    <label for="brand_id">Thương hiệu</label>
                                    <select name="brand_id" id="brand_id" class="form-control" required>
                                        <option value="">--Chọn thương hiệu--</option>
                                        <?= $html_brand_id; ?>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="qty">Số lượng</label>
                                    <input type="number" value="1" min="1" id="qty" name="qty" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="price">Giá</label>
                                    <input type="number" value="1000" step="500" min="1000" id="price" name="price" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="price_sale">Giá khuyến mãi</label>
                                    <input type="number" value="1000" step="500" min="1000" id="price_sale" name="price_sale" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="image">Hình ảnh</label>
                                    <input type="file" id="image" name="image" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    </select>
                                    <label for="status">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="2">Chưa xuất bản</option>
                                        <option value="1">Xuất bản</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                    <button name="THEM" type="submit" class="btn btn-sm btn-success">
                        <i class="fas fa-save"></i> Lưu[Thêm]
                    </button>
                    <a class="btn btn-sm btn-info" href="index.php?option=product">
                        <i class="fas fa-chevron-left"></i> Quay về danh sách
                    </a>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</form>

<?php require_once('../views/backend/footer.php'); ?>