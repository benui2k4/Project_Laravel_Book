<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Common\CartHelp;
use App\Mail\OrderEmail;
use Mail;


class CartOrderController extends Controller
{
    public function checkout(){
      $auth = auth('cus')->user();
       return view('cart.checkout',compact('auth'));
    }


    public function post_checkout(Request $req , CartHelp $cart){
      $auth = auth('cus')->user();
      $checkSave = true;
      $form_data = $req->only('name','email','phone','address');

      $form_data['customer_id'] = auth('cus')->id();
      $form_data['token'] = \Str::random(40);

      if ($order = Order::create($form_data)){
         // duyệt giỏ hàng 
         foreach ($cart->items as $item ) {
            $detail = [
               'order_id' => $order->id,
               'product_id' => $item->id,
               'price' => $item->price,
               'quantity' => $item->quantity
            ];

           if (!OrderDetail::create($detail)){

            $checkSave = false;

            break;

           }

         }
         if($checkSave){
            // gửi mail
            $emailto = $auth->email;
            Mail::to($emailto)->send(new OrderEmail($order,$auth));
            // hủy
            $cart->clear();
            return redirect()->route('order.checkout')->with('ok','Đặt hàng thành công , kiếm tra email '.$auth->email.' để xác nhận');
         } else {
            OrderDetail::where('order_id',$order->id)->delete();
            $order->delete();
            return redirect()->back()->with('no','Đặt hàng không thành công');
         }


      }
       return view('cart.checkout',compact('auth'));
    }

    
    public function detail(Order $order){
       return view('cart.detail' ,compact('order'));
    }    
    
    public function myOrder(){
       return view('cart.myOrder');
    }

    public function verify($token){
       $order = Order::where('token',$token)->firstOrFail();

       $order->update(['status' => 1 ,'token' => null]);
       return redirect()->route('order.checkout')->with('ok','Xác nhận đơn hàng thành công');
    }
}