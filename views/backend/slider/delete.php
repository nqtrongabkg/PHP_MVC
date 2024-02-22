<?php
use App\Models\Slider;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Slider::find($id);
$row -> status = 0;
$row -> updated_at = date('Y-m-d H:i:s');
$row -> updated_by = 1; //id của người đăng nhập
$row -> save(); //lưu
MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Chuyển vào thùng rác thành công']);

header('location: index.php?option=slider');