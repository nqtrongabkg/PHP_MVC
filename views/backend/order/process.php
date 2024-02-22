<?php
use App\Models\Order;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;

if(isset($_POST['THEM']))
{
    $row = new Order;
    $row->name = $_POST['name'];
    $row->email = $_POST['email'];
    $row->phone = $_POST['phone'];
    $row->note = $_POST['note'];
    $row->address = $_POST['address'];
    $row->status = $_POST['status'];
    $row->created_at = date('Y-m-d H:i:s');
    $row->save();

    MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Thêm thành công']);

    header('location: index.php?option=order');
}

if(isset($_POST['CAPNHAT']))
{
    $id = $_POST['id'];
    $row = order::find($id);
    $row->name = $_POST['name'];
    $row->email = $_POST['email'];
    $row->phone = $_POST['phone'];
    $row->address = $_POST['adress'];
    $row->note = $_POST['note'];
    $row->status = $_POST['status'];
    $row->updated_at = date('Y-m-d H:i:s');
    $row->updated_by = 1;
    $row->save();

    MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Cập nhật thành công']);

    header('location: index.php?option=order');
}