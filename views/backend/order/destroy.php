<?php
use App\Models\Order;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Order::find($id);
$row -> delete();
MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Xóa thành công']);

header('location: index.php?option=order&cat=trash');