<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
       return view('admin.dashboard');
    }
    public function login()
    {
        // User::create([
        //     'name' =>'Đỗ Thị Loan',
        //     'email' =>'admin@gmail.com',
        //     'password' =>bcrypt(123456),
        // ]);
       return view('admin.login');
    }
    public function check_login(Request $request )
    {
      $request->validate([
        'email' =>'required |email|exists:users',
        'password' => 'required'
      ],[
        'email.exists' => 'Tài khoản không chính xác!',
        // 'password.exists' => 'Mật khẩu không chính xác!',
        'email.required' => 'Vui lòng nhập email để đăng nhập!',
        'password.required' => 'Vui lòng nhập mật khẩu để đăng nhập!',
        'email.email' => 'Vui lòng nhập đúng định dạng email!',
      ]);
      $form_data = $request->only('email','password');
      $check_login = Auth::attempt($form_data);
     

      if($check_login == true){
        return redirect()->route('admin')->with('ok','Bạn đã đăng nhập thành công!');
      } else {
        return redirect()->back();
      }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login')->with('ok','Đăng xuất tài khoản thành công!');
    }

    public function register(){
      return view('admin.register');
    }

    public function post_register(Request $req){

      $req->validate([
        'name' => 'required|min:3|max:25|',
        'email' => 'required|email|unique:users',
        'password' => 'required'
      ],[
        'name.required' => 'Vui lòng nhập tên!',
        'name.min' => 'Độ dài tên ít nhât 3 kí tự.Vui lòng sửa lại!',
        'name.max' => 'Độ dài tên tối đa 25 kí tự.Vui lòng sửa lại!',
        'email.required' => 'Vui lòng nhập email!',
        'email.email' => 'Vui lòng nhập đúng định dạng email!',
        'email.unique' => 'Email đã tồn tại.Vui lòng dùng email khác để đăng kí!',
        'password.required' => 'Vui lòng nhập mật khẩu để đăng kí!',
      ]);

      $formData = $req->only('name','email','password');

      $formData['password'] = bcrypt($req->password);
     
      if(User::create($formData)){
       return redirect()->route('admin.login')->with('ok','Đăng kí tài khoản thành công!');
      }
       return redirect()->back();
    } 
}