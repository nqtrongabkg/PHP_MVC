<?php
use App\Models\Contact;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;

if(isset($_POST['THEM']))
{
    $row = new Contact;
    $row->name = $_POST['name'];
    $row->email = $_POST['email'];
    $row->phone = $_POST['phone'];
    $row->title = $_POST['title'];
    $row->content = $_POST['content'];
    $row->status = $_POST['status'];
    $row->created_at = date('Y-m-d H:i:s');
    $row->save();

    MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Thêm thành công']);

    header('location: index.php?option=contact');
}

if(isset($_POST['CAPNHAT']))
{
    $id = $_POST['id'];
    $row = Contact::find($id);
    $row->name = $_POST['name'];
    $row->email = $_POST['email'];
    $row->phone = $_POST['phone'];
    $row->content = $_POST['content'];
    $row->title = $_POST['title'];
    $row->status = $_POST['status'];
    $row->updated_at = date('Y-m-d H:i:s');
    $row->updated_by = 1;
    $row->save();

    MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Cập nhật thành công']);

    header('location: index.php?option=contact');
}