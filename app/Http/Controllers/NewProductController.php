<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewProductCreateRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\NewProduct;

class NewProductController extends Controller
{
    public function newproduct_index(Request $req)
    {
        $keyword= $req->keyword;
        if($keyword) {
            $newproduct = NewProduct::orderBy('id', 'DESC')->where('name','Like','%'.$keyword.'%')->paginate(5);
            $cats = Category::orderBy('name', 'ASC')->get();
        } else{
            $cats = Category::orderBy('name', 'ASC')->get();
            $newproduct = NewProduct::orderBy('id', 'DESC')->paginate(5);
        }
        return view('newproduct.index', compact('newproduct'));
    }

    public function newproduct_create()
    {
        $newproduct = NewProduct::orderBy('name', 'ASC')->get();
        $category = Category::orderBy('name', 'ASC')->get();
        return view('newproduct.create', compact('category', 'newproduct'));
    }

    public function newproduct_store(NewProductCreateRequest $request)
    {

        $request->validate([
            'name' => 'required|unique:newproducts',
            'file' => 'file|mimes:jpg,jpeg,png,gif,webp',
        ],[
            'name.required' => 'Sản phẩm không được để trống. Vui lòng điền tên sản phẩm.',
            'name.unique' => 'Sản phẩm đã tồn tại. Hãy thử đặt tên sản phẩm khác.',
            'file.required' => 'Ảnh của sản phẩm không được để trống. Vui lòng chọn ảnh của sản phẩm.'
        ]);
        $image = time() . '-' . $request->file->getClientOriginalName();
        $path = public_path('uploads');
        $request->file->move($path, $image);

        $form_data = $request->only('author', 'name', 'category_id', 'description', 'publication_date');
        $form_data['image'] = $image;
        if (NewProduct::create($form_data)) {
            return redirect()->route('newproduct.index')->with('ok','Thêm mới sản phẩm sắp ra mắt thành công!');
        }
        return redirect()->back();
    }


    public function newproduct_edit(NewProduct $newproduct)
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('newproduct.edit', compact('newproduct', 'categories'));
    }

    public function newproduct_update(NewProductCreateRequest $req, NewProduct $newproduct)
    {
        $form_data = $req->only('author', 'name', 'image', 'description', 'category_id', 'publication_date');
        $path = public_path('uploads');
        if ($req->file) {
            $image = time() . '-' . $req->file->getClientOriginalName();
            $req->file->move($path, $image);
            $form_data['image'] = $image;
        }
        $newproduct->update($form_data);
        return redirect()->route('newproduct.index')->with('ok','Cập nhật sản phẩm sắp ra mắt thành công!');
    }

    public function newproduct_delete(NewProduct $newproduct)
    {
        $newproduct->delete();
        return redirect()->route('newproduct.index')->with('ok','Xóa sản phẩm sắp ra mắt thành công!');
        return abort(403);
    }
}
