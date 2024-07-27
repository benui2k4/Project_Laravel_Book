<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Common\CartHelp;
class CartController extends Controller
{
    function view(CartHelp $cart){
        
        return view('cart.view',compact('cart'));
    }

    function add(CartHelp $cart, Product $product ,$quantity = 1 ){
        $cart->add($product,$quantity);
        return redirect()->route('cart.view')->with('ok','Thêm giỏ hàng thành công');
    }


    function remove(CartHelp $cart, Product $product){
        $cart->remove($product);
        return redirect()->route('cart.view')->with('ok','Xóa sản phẩm trong giỏ hàng thành công');
    }
    function update( CartHelp $cart, Product $product ){
        $quantity = request('quantity',1);
        if ($quantity <= 0) {
            return redirect()->route('cart.view')->with('no', 'Số lượng không hợp lệ ! Vui lòng điều chỉnh lại.');
        }
        $cart->update($product, $quantity);
        return redirect()->route('cart.view')->with('ok','Cập nhật giỏ hàng thành công');
    }
    function clear( CartHelp $cart, Product $product){
        $cart->clear($product);
        return redirect()->route('cart.view')->with('ok','Xóa giỏ hàng thành công');
    }
}