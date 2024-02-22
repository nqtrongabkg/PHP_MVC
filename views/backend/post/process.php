<?php
use App\Models\Post;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;

if(isset($_POST['THEM']))
{
    $row = new Post;
    $row->type = $_POST['type'];
    $row->metadesc = $_POST['metadesc'];
    $row->metakey = $_POST['metakey'];
    $row->title = $_POST['title'];
    $row->status = $_POST['status'];
    $row->slug = Mystring::str_slug($_POST['type']);
    $row->created_at = date('Y-m-d H:i:s');
    $row->created_by = 1;
    $row->save();

    MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Thêm thành công']);

    header('location: index.php?option=post');
}

if(isset($_POST['CAPNHAT']))
{
    $id = $_POST['id'];
    $row = post::find($id);
    $row->type = $_POST['type'];
    $row->title = $_POST['title'];
    $row->metadesc = $_POST['metadesc'];
    $row->metakey = $_POST['metakey'];
    $row->status = $_POST['status'];
    $row->slug = Mystring::str_slug($_POST['type']);
    $row->updated_at = date('Y-m-d H:i:s');
    $row->updated_by = 1;
    $row->save();

    MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Cập nhật thành công']);

    header('location: index.php?option=post');
}