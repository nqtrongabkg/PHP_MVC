<?php
use App\Models\User;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = User::find($id);
$row -> delete();
MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Xóa thành công']);

header('location: index.php?option=user&cat=trash');