<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\NewProduct;
use Illuminate\Http\Request;
use Auth;
use App\Mail\ContactMail;
use Mail;

class HomeController extends Controller
{
    public function home()
    {
        $product = Product::all();
        $category = Category::all();
        $newproduct = NewProduct::all(); 
        return view('home', compact('product', 'category', 'newproduct'));
    }

    public function category()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(4);
        return view('category', compact('categories'));
    }

    public function product()
    {
        $product = Product::orderBy('id', 'DESC')->paginate(5);
        return view('product', compact('product'));
    }

    public function newproduct()
    {
        $newproduct = NewProduct::orderBy('id', 'DESC')->paginate(5);
        return view('newproduct', compact('newproduct'));
    }

    public function admin()
    {
        return view('admin');
    }

    public function newproduct_index()
    {
        $newproduct = NewProduct::all();
        return view('newproduct.index', compact('newproduct'));
    }

    public function newproduct_create()
    {
        return view('newproduct.create');
    }

    public function newproduct_store(Request $request)
    {
        $newproductName = $request->input('newproduct_name');
        $newproductDescription = $request->input('newproduct_description');
        return redirect()->route('newproduct.index')->with('success', 'Sản phẩm đã được tạo thành công.');
    }


    public function product_index()
    {
        $product = Product::all();
        return view('product.index', compact('product'));
    }

    public function product_create()
    {
        return view('product.create');
    }

    public function product_store(Request $request)
    {
        $productName = $request->input('product_name');
        $productDescription = $request->input('product_description');
        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được tạo thành công.');
    }

    public function category_index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function category_create()
    {
        return view('category.create');
    }

    public function category_store(Request $request)
    {
        $categoryName = $request->input('name');
        return redirect()->route('category.index')->with('success', 'Danh mục đã được tạo thành công.');
    }

    public function list_chuyen()
    {
        return view('list.chuyen');
    }
    public function list_codai()
    {
        return view('list.codai');
    }
    public function list_drama()
    {
        return view('list.drama');
    }
    public function list_kinhdi()
    {
        return view('list.kinhdi');
    }
    public function list_ngon()
    {
        return view('list.ngon');
    }
    public function list_tamly()
    {
        return view('list.tamly');
    }
    public function list_xuyen()
    {
        return view('list.xuyen');
    }

    // phương thúc contact mail

    public function contact(){
      return view('contact');
     }

    public function post_contact(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|',
            'phone' => 'required|number|',
            'body' => 'required'
        ],[
            'name.required' => 'Vui lòng nhập họ và tên !' ,
            'email.required' => 'Vui lòng nhập email để liên hệ với chúng tôi !',
            'email.email' => 'Vui lòng nhập đúng định dạng email ! ',
            'phone.required' => 'Vui lòng nhập số điện thoại liên hệ !',
            'phone.number' => 'Vui lòng nhập đúng định dạng số điện thoại !',
            'body.required' => 'Vui lòng nhập nội dung để liên hệ !'
        ]);
        $email = $req->email;
        $data = $req->only('name','phone','email','body');
       Mail::to($email)
       ->send(new ContactMail($data));

      return redirect()->route('contact')->with('ok','Gửi mail thành công , Cảm ơn bạn đã liên hệ !');
    }

    // phương thức login & register

    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }

    public function profile() {
        $auth = auth('cus')->user();
        return view('profile', compact('auth'));
    }

    public function logout(){
        auth('cus')->logout();
        return redirect()->route('login');
    }
    public function check_login(Request $req){
        $req->validate([
            'email' =>'required |email|exists:customer',
            'password' => 'required'
        ],[
                // vadidate
                'email.exists' => 'Tài khoản hoặc mật khẩu không chính xác!',
                'email.required' => 'Vui lòng nhập email để đăng nhập!',
                'password.required' => 'Vui lòng nhập mật khẩu để đăng nhập!',
                'email.email' => 'Vui lòng nhập đúng định dạng email!',

        ]);

        $routeName = request('returnUrl','home');

       $formData = $req->only('email','password');

       if(auth('cus')->attempt($formData)){

          return redirect()->route($routeName);
        }

        return redirect()->back();
    }
    public function post_register(Request $req){
        $req->validate([
            'name' => 'required',
            'email' =>'required|email|unique:customer',
            'phone' =>'required|unique:customer',
            'address' =>'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ],[
            // validate 
            'name.required' =>'Vui lòng nhập họ tên!',
            'email.required' =>'Vui lòng nhập email!',
            'address.required' =>'Vui lòng nhập địa chỉ!',
            'password.required' =>'Vui lòng nhập mật khẩu!',
            'password.same' =>'Vui lòng nhập lại đúng mật khẩu!',
            'confirm_password.required' =>'Vui lòng nhập lại mật khẩu!',
            'email.email' =>'Vui lòng nhập đúng định dạng email!',
            'email.unique' =>'Email đã có người sử dụng!',
            'phone.required' =>'Vui lòng nhập số điện thoại!',
            'phone.unique' =>'Số điện thoại đã có người sử dụng!',
            
        ]);
       $formData = $req->only('name','phone','email','address','password');
       $formData['password'] = bcrypt($req->password);

     if(Customer::create($formData)){

        return redirect()->route('login')->with('ok','Đăng kí tài khoản thành công!');
     }
        return redirect()->back();

    }

   

}