<?php
use App\Models\Brand;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Brand::find($id);
$row -> delete();
MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Xóa thành công']);

header('location: index.php?option=brand&cat=trash');