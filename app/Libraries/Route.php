<?php
namespace App\Libraries;
//Gọi trang người dùng và trang quản trị
class Route
{
    public function __construct($page='site')
    {
        switch ($page){
            case 'site': {
                $this->route_site();
                break;
            }
            case 'admin': {
                $this->route_admin();
                break;
            }
            default: {
                $this->route_site();
            }
        }
    }

    //tuy bien trang nguoi dung
    function route_site()
    {
        $pathView='views/frontend/';
        if(isset($_REQUEST['option'])){
            $pathView .=$_REQUEST['option'];
            if(isset($_REQUEST['id'])){
                $pathView .= '-detail.php';
            } else {
                if (isset($_REQUEST['cat'])){
                    $pathView .= '-category.php';
                } else {
                    $pathView .='.php';
                }
            }
        } else {
        $pathView .= 'home.php';
        }
        require_once($pathView);
    }

    //tùy biến trang admin
    function route_admin()
    {
        $pathView='../views/backend/';
        if(isset($_REQUEST['option'])){
            $pathView .=$_REQUEST['option'] . '/';
            if(isset($_REQUEST['cat'])){
                $pathView .= $_REQUEST['cat'] . ".php";
            } else {
                $pathView .= "index.php";
            }
        } else {
            $pathView .= "dashboard/index.php";
        }
        require_once($pathView);
    }
}