<?php
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Orderdetail;
use App\Libraries\Cart;

if(isset($_REQUEST['addcat']))
{
    $id = $_REQUEST['addcat'];
    //lấy ra sp
    $product = Product::find($id);
    //tạo mảng sp
    $cart_item = array(
        'id' => $product->id,
        'price' => $product->price,
        'qty' => 1,
        'amount' => $product->price
    );
    //kiểm tra
    //TH1 chuưa có giỏ hàng -> thêm mới giỏ
    //TH2 đã có trong giỏ -> qty++
    //TH3 chưa có trong giỏ -> thêm vào
    if(isset($_SESSION['contentcart']))
    {
        $carts = $_SESSION['contentcart'];
        if((Cart::cart_exists($carts, $id) == true))
        {
            $carts = Cart::cart_update($carts,$id,1,"add");
        }
        else
        {
            $carts[] = $cart_item;
        }
        $_SESSION['contentcart'] = $carts;
    }
    else
    {
        $carts[] = $cart_item;//$cart là mảng ha chiều 
        $_SESSION['contentcart'] = $carts;
    }
    header("location:index.php?option=cart");
}

//xu ly xoa
if(isset($_REQUEST['delcart']))
{
    $id = $_REQUEST['delcart'];
    if(isset($_SESSION['contentcart']))
    {
        $carts = $_SESSION['contentcart'];
        $carts = Cart::cart_delete($carts, $id);
        $_SESSION['contentcart'] = $carts;
    }
    header("location:index.php?option=cart");
}

//xu ly cap nhat
if(isset($_POST['updateCart']))
{
    $arr_qty = $_POST['qty'];
    foreach($arr_qty as $id => $number)
    {
        $carts = $_SESSION['contentcart'];
        $carts = Cart::cart_update($carts,$id,$number,"update");
        $_SESSION['contentcart'] = $carts;
    }
    header("location:index.php?option=cart");
}

//xu ly thanh toan

if(isset($_REQUEST['checkoutCart']))
{
    //luu vao bang order
    $user = User::find($_SESSION['user_id']); 
    $date = getdate();
    $order = new Order();
    $order->code = $date[0];
    $order->user_id = $_SESSION['user_id'];
    $order->deliveryaddress = (isset($_POST['deliveryaddress'])?$_POST['deliveryaddress']:$user['address']);
    $order->deliveryname = (isset($_POST['deliveryname'])?$_POST['deliveryname']:$user['name']);
    $order->deliveryphone = (isset($_POST['deliveryphone'])?$_POST['deliveryphone']:$user['phone']);
    $order->deliveryemail = (isset($_POST['deliveryemail'])?$_POST['deliveryemail']:$user['email']);
    $order->created_at = date('Y-m-d H:i:s');
    $order->status = 2;
    if($order->save())
    {
        $carts = $_SESSION['contentcart'];
        foreach($carts as $cart)
        {
            $orderdetail = new Orderdetail();
            $orderdetail->order_id = $order->id;
            $orderdetail->product_id = $cart['id'];
            $orderdetail->price = $cart['price'];
            $orderdetail->qty = $cart['qty'];
            $orderdetail->amount = $cart['amount'];
            $orderdetail->save();
        }
    }
    unset($_SESSION['contentcart']);
    header("location:index.php?option=cart");
}

if(isset($_REQUEST['checkout']))
{
    require_once('views/frontend/cart-checkout.php');
}
else
{
    require_once('views/frontend/cart-content.php');
}


?>