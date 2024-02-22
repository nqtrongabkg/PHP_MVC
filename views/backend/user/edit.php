<?php
use App\Models\User;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = User::find($id);

$list = User::where('status', '!=', '0') -> get();
$html_parent_id = '';
$html_sort_order = '';
foreach($list as $item)
{
    if($item->id == $row->parent_id)
    {
        $html_parent_id .= "<option selected value='" .$item->id ."'>" .$item->name ."</option>"; 
    }
    else
    {
        $html_parent_id .= "<option value='" .$item->id ."'>" .$item->name ."</option>";
    }

    if($item->sort_order == $row->sort_order)
    {
        $html_sort_order .= "<option selected value='" .($item->sort_order + 1) ."'> Sau: " .$item->name ."</option>";
    }
    else
    {
        $html_sort_order .= "<option value='" .($item->sort_order + 1) ."'> Sau: " .$item->name ."</option>";
    }
}
?>

<?php require_once('../views/backend/header.php'); ?>

<form action="index.php?option=user&cat=process" method="post" enctype="multipart/form-data">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>CẬP NHẬT DANH MỤC</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Cập nhật danh mục</li>
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
                            <button name="CAPNHAT" type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i> Lưu[Cập nhật]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=user">
                                <i class="fas fa-chevron-left"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-4">
                                <input type="hidden" name="id" value="<?=$row['id'];?>">
                                <label for=" name">Tên danh mục</label>
                                <input type="text" name="name" value="<?=$row['name'];?>" id="name" class="form-control"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="email">Email</label>
                                <textarea name="email" id="email" class="form-control"
                                    required><?=$row['email'];?></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="phone">Số điện thoại</label>
                                <textarea name="phone" id="phone" class="form-control"
                                    required><?=$row['phone'];?></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="address">Địa chỉ</label>
                                <textarea name="address" id="address" class="form-control"
                                    required><?=$row['address'];?></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="username">Tên đăng nhập</label>
                                <textarea name="username" id="username" class="form-control"
                                    required><?=$row['username'];?></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="password">Mật khẩu</label>
                                <textarea name="password" id="password" class="form-control"
                                    required><?=$row['password'];?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-9">
                                <div class="mb-4">
                                    </select>
                                    <label for="roles">Phân quyền</label>
                                    <select name="roles" id="roles" class="form-control">
                                        <option value="0">--Quản trị--</option>
                                        <option value="0">--Người dùng--</option>
                                        <?= $html_roles; ?>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="image">Hình ảnh</label>
                                    <input type="file" id="image" name="image" class="form-control">
                                </div>
                                <div class="mb-4">
                                    </select>
                                    <label for="status">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="2" <?=($row->status == 2)? 'selected' : ''; ?>>Chưa xuất bản
                                        </option>
                                        <option value="1" <?=($row->status == 1)? 'selected' : ''; ?>>Xuất bản</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                    <button name="CAPNHAT" type="submit" class="btn btn-sm btn-success">
                        <i class="fas fa-save"></i> Lưu[Cập nhật]
                    </button>
                    <a class="btn btn-sm btn-info" href="index.php?option=user">
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