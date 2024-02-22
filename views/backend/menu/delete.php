<?php
use App\Models\Menu;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Menu::find($id);
$row -> status = 0;
$row -> updated_at = date('Y-m-d H:i:s');
$row -> updated_by = 1; //id của người đăng nhập
$row -> save(); //lưu
MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Chuyển vào thùng rác thành công']);

header('location: index.php?option=menu');