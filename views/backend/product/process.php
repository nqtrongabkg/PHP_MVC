<?php
use App\Models\Product;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;

if(isset($_POST['THEM']))
{
    $row = new Product;
    $row->name = $_POST['name'];
    $row->slug = Mystring::str_slug($_POST['name']);
    $row->metadesc = $_POST['metadesc'];
    $row->metakey = $_POST['metakey'];
    $row->detail = $_POST['detail'];

    $row->category_id = $_POST['category_id'];
    $row->brand_id = $_POST['brand_id'];
    $row->price = $_POST['price'];
    $row->price_sale = $_POST['price_sale'];
    $row->qty = $_POST['qty'];
    $row->status = $_POST['status'];
    $row->created_at = date('Y-m-d H:i:s');
    $row->created_by = 1;

///uploadfile
    $path_dir = "../public/images/product/";
    $file = $_FILES["image"];
    $path_file = $path_dir . basename($file["name"]);
    $file_extension = strtolower(pathinfo($path_file,PATHINFO_EXTENSION));  
    if(in_array($file_extension,["png", "gif", "jpg"]))
    {
        $path_file = $path_dir . $row->slug . "." . $file_extension;
        move_uploaded_file($file['tmp_name'],$path_file);
        $row->image = $row->slug . "." . $file_extension;
        $row->save();
        MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Thêm thành công']);
        header('location: index.php?option=product');
    }
    else
    {
        MessageArt::set_flash('message',  ['type'=>'danger', 'smg'=>'Thêm hình ảnh không thành công']);
        header('location: index.php?option=product&cat=create');
    }
///enduploadfile
}

if(isset($_POST["CAPNHAT"]))
{
    $id = $_POST['id'];
    $row = Product::find($id);
    $row->name = $_POST['name'];
    $row->slug = Mystring::str_slug($_POST['name']);
    $row->metadesc = $_POST['metadesc'];
    $row->metakey = $_POST['metakey'];
    $row->detail = $_POST['detail'];

    $row->category_id = $_POST['category_id'];
    $row->brand_id = $_POST['brand_id'];
    $row->price = $_POST['price'];
    $row->price_sale = $_POST['price_sale'];
    $row->qty = $_POST['qty'];
    $row->status = $_POST['status'];
    $row->updated_at = date('Y-m-d H:i:s');
    $row->updated_by = 1;

///uploadfile
    if(strlen($_FILES["image"]['name']) != 0)
    {
        $path_dir = "../public/images/product/";
        $file = $_FILES["image"];
        $path_file = $path_dir . basename($file["name"]);
        $file_extension = strtolower(pathinfo($path_file,PATHINFO_EXTENSION));
        if(!in_array($file_extension,['png', 'gif', 'jpg']))
        {
            MessageArt::set_flash('message',  ['type'=>'danger', 'smg'=>'Thêm hình ảnh không thành công']);
            header('location: index.php?option=product&cat=edit');
        }
        $path_file = $path_dir . $row->slug . "." . $file_extension;
        $path_delete = $path_dir . $row->image;
        if (file_exists($path_delete)) {
            unlink($path_delete);
        }
        move_uploaded_file($file['tmp_name'],$path_file);
        $row->image = $row->slug . "." . $file_extension;
    } 
    $row->save();
    MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Cập nhật thành công']);
    header('location: index.php?option=product');
    
///enduploadfile
}