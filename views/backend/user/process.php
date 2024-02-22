<?php
use App\Models\User;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;

if(isset($_POST['THEM']))
{
    $row = new User;
    $row->name = $_POST['name'];
    $row->email = $_POST['email'];
    $row->phone = $_POST['phone'];
    $row->address = $_POST['address'];
    $row->roles = $_POST['roles'];
    $row->username = $_POST['username'];
    $row->password = $_POST['password'];
    $row->status = $_POST['status'];
    $row->created_at = date('Y-m-d H:i:s');
    $row->created_by = 1;
    $row->save();

    MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Thêm thành công']);

    header('location: index.php?option=user');
}

if(isset($_POST['CAPNHAT']))
{
    $id = $_POST['id'];
    $row = User::find($id);
    $row->name = $_POST['name'];
    $row->email = $_POST['email'];
    $row->phone = $_POST['phone'];
    $row->address = $_POST['address'];
    $row->image = $_POST['image'];
    $row->roles = $_POST['roles'];
    $row->username = $_POST['username'];
    $row->password = $_POST['password'];
    $row->status = $_POST['status'];
    $row->updated_at = date('Y-m-d H:i:s');
    $row->updated_by = 1;
    $row->save();

    MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Cập nhật thành công']);

    header('location: index.php?option=user');
}