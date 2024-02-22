<?php
use App\Models\Category;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Category::find($id);
$row -> delete();
MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Xóa thành công']);

header('location: index.php?option=category&cat=trash');