<?php
use App\Models\Post;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Post::find($id);
$row -> status = 2;
$row -> updated_at = date('Y-m-d H:i:s');
$row -> updated_by = 1; //id của người đăng nhập
$row -> save(); //lưu

MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Khôi phục thành công']);

header('location: index.php?option=post&cat=trash');