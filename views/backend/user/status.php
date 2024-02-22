<?php
use App\Models\User;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = User::find($id);

if ($row == null)
{
    MessageArt::set_flash('message',  ['type'=>'danger', 'smg'=>'Mẫu tin không tồn tại']);
    header('location: index.php?option=user');
}

$row -> status = ($row['status'] == 1) ? 2 : 1;
$row -> updated_at = date('Y-m-d H:i:s');
$row -> updated_by = 1; //id của người đăng nhập
$row -> save(); //lưu


MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Thay đổi trạng thái thành công']);

header('location: index.php?option=user');