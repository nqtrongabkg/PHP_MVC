<?php
use App\Models\Category;
use App\Models\Menu;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Post;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;

if(isset($_POST['THEMCATEGORY']))
{
    if(isset($_POST['categoryId']))
    {
        $listid = $_POST['categoryId'];
        foreach($listid as $id)
        {
            $category = Category::find($id);
            $menu = new Menu;
            $menu->name = $category -> name;
            $menu->link = 'index.php?option=product&cat=' . $category -> slug;
            $menu->type = 'category';
            $menu->table_id = $category -> id;
            $menu->sort_order = 1;
            $menu->status = 1;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = $_SESSION['user_id'];
            $menu->save();
        }
        MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Thêm thành công']);
        header('location: index.php?option=menu');
    }
    MessageArt::set_flash('message',  ['type'=>'danger', 'smg'=>'Chưa chọn danh mục']);
    header('location: index.php?option=menu');
    
}
if(isset($_POST['THEMBRAND']))
{
    if(isset($_POST['brandId']))
    {
        $listid = $_POST['brandId'];
        foreach($listid as $id)
        {
            $brand = Brand::find($id);
            $menu = new Menu;
            $menu->name = $brand -> name;
            $menu->link = 'index.php?option=brand&cat=' . $brand -> slug;
            $menu->type = 'brand';
            $menu->table_id = $brand -> id;
            $menu->sort_order = 1;
            $menu->status = 2;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = $_SESSION['user_id'];
            $menu->save();
        }
        MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Thêm thành công']);
        header('location: index.php?option=menu');
    }
    MessageArt::set_flash('message',  ['type'=>'danger', 'smg'=>'Chưa chọn thương hiệu']);
    header('location: index.php?option=menu');
    
}
if(isset($_POST['THEMTOPIC']))
{
    if(isset($_POST['topicId']))
    {
        $listid = $_POST['topicId'];
        foreach($listid as $id)
        {
            $topic = Topic::find($id);
            $menu = new Menu;
            $menu->name = $topic -> name;
            $menu->link = 'index.php?option=post&cat=' . $topic -> slug;
            $menu->type = 'topic';
            $menu->table_id = $topic -> id;
            $menu->sort_order = 1;
            $menu->status = 1;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = $_SESSION['user_id'];
            $menu->save();
        }
        MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Thêm thành công']);
        header('location: index.php?option=menu');
    }
    MessageArt::set_flash('message',  ['type'=>'danger', 'smg'=>'Chưa chọn chủ đề']);
    header('location: index.php?option=menu');
    
}
if(isset($_POST['THEMPAGE']))
{
    if(isset($_POST['pageId']))
    {
        $listid = $_POST['pageId'];
        foreach($listid as $id)
        {
            $page = Post::find($id);
            $menu = new Menu;
            $menu->name = $page->title;
            $menu->link = 'index.php?option=page&cat=' . $page -> slug;
            $menu->type = 'page';
            $menu->table_id = $page -> id;
            $menu->sort_order = 1;
            $menu->status = 1;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = $_SESSION['user_id'];
            $menu->save();
        }
        MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Thêm thành công']);
        header('location: index.php?option=menu');
    }
    else
    {
        MessageArt::set_flash('message',  ['type'=>'danger', 'smg'=>'Chưa chọn trang']);
        header('location: index.php?option=menu');
    }  
}
if(isset($_POST['THEMCUSTOM']))
{
    if(strlen($_POST['name'])>0 && strlen($_POST['link'])>0)
    {
        $menu = new Menu;
        $menu->name = $_POST['name'];
        $menu->link = $_POST['link'];
        $menu->type = 'custom';
        $menu->sort_order = 1;
        $menu->status = 1;
        $menu->position = $_POST['position'];
        $menu->parent_id = 0;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by = $_SESSION['user_id'];
        $menu->save();
        MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Thêm thành công']);
        header('location: index.php?option=menu');
    }
    else
    {
        MessageArt::set_flash('message',  ['type'=>'danger', 'smg'=>'Chưa đủ thông tin']);
        header('location: index.php?option=menu');
    }
}

// if(isset($_POST['CAPNHAT']))
// {
//     $id = $_POST['id'];
//     $row = Category::find($id);
//     $row->name = $_POST['name'];
//     $row->metadesc = $_POST['metadesc'];
//     $row->metakey = $_POST['metakey'];
//     $row->parent_id = $_POST['parent_id'];
//     $row->sort_order = $_POST['sort_order'];
//     $row->status = $_POST['status'];
//     $row->slug = Mystring::str_slug($_POST['name']);
//     $row->updated_at = date('Y-m-d H:i:s');
//     $row->updated_by = $_SESSION['user_id'];
//     $row->save();

//     MessageArt::set_flash('message',  ['type'=>'success', 'smg'=>'Cập nhật thành công']);

//     header('location: index.php?option=category');
// }