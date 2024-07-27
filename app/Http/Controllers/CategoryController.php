<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryCreateRequest;

class CategoryController extends Controller
{
    public function category_index(Request $req)
    {
        $keyword = $req->keyword;
        if($keyword) {
            $categories = Category::orderBy('id', 'DESC')->where('name','LIKE','%'.$keyword.'%')->paginate(5);
        } else {
            $categories = Category::orderBy('id', 'DESC')->paginate(5);
        }
        return view('category.index', compact('categories'));
    }

    public function category_create()
    {
        $categories = Category::all();
        return view('category.create', ['categories' => $categories]);
    }

    public function category_store(CategoryCreateRequest $req)
    {
       
        $form_data = $req->only('name');
        Category::create($form_data);
        return redirect()->route('category.index')->with('ok','Thêm mới danh mục thành công!');
    }

    public function category_edit(Category $categories)
    {

        return view('category.edit', compact('categories'));
    }

    public function category_update(CategoryCreateRequest $req, Category $categories)
    {
        $form_data = $req->only('name');
        $categories->update($form_data);
        return redirect()->route('category.index')->with('ok','Cập nhật danh mục thành công!');
    }

    public function category_delete(Category $categories)
    {
       
        if (Product::where('category_id', $categories->id)->count() == 0) {
            $categories->delete();
            
            return redirect()->route('category.index')->with('ok','Xóa danh mục thành công!');
        }
        return abort(403);
    }
}
