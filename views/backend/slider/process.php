<?php
use App\Models\Slider;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;

if(isset($_POST['THEM']))
{
    $row = new Slider;
    $row->name = $_POST['name'];
    $row->position = "slideshow";
    $row->status = $_POST['status'];
    $row->created_at = date('Y-m-d H:i:s');
    $row->created_by = 1;
    $row->save();

    MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Thêm thành công']);

    header('location: index.php?option=slider');
}

if(isset($_POST['CAPNHAT']))
{
    $id = $_POST['id'];
    $row = Slider::find($id);
    $row->name = $_POST['name'];
    $row->status = $_POST['status'];
    $row->updated_at = date('Y-m-d H:i:s');
    $row->updated_by = 1;
    $row->save();

    MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Cập nhật thành công']);

    header('location: index.php?option=slider');
}