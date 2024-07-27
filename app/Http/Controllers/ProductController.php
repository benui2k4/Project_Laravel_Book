<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;


class ProductController extends Controller
{
    public function product_index( Request $req)
    {
        $keyword = $req->keyword;
        if($keyword) {
            $products = Product::orderBy('id', 'DESC')->where('name','LIKE','%'.$keyword.'%')->paginate(5);
            $cats = Category::orderBy('name', 'ASC')->get();

        } else {
            $products = Product::orderBy('id', 'DESC')->paginate(5);
            $cats = Category::orderBy('name', 'ASC')->get();
        }
        return view('product.index', compact('products'));
    }

    public function product_create()
    {
        $products = Product::orderBy('name', 'ASC')->get();
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('product.create', compact('categories', 'products'));
    }

    public function product_store(Product  $product, ProductCreateRequest  $request)
    {

    //  validate

        $image = time() . '-' . $request->file->getClientOriginalName();
        $path = public_path('uploads');
        $request->file->move($path, $image);

        $form_data = $request->only('author', 'name', 'price', 'sale_price', 'category_id', 'description');
        $form_data['image'] = $image;
        if (Product::create($form_data)) {
            
            return redirect()->route('product.index')->with('ok','Thêm mới sản phẩm thành công!');
        }
        return redirect()->back();
    }




    public function product_edit(Product $product)
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('product.edit', compact('product', 'categories'));
    }

    public function product_update(ProductUpdateRequest $req, Product $product)
    {
        $form_data = $req->only('author', 'name', 'price', 'sale_price', 'image', 'description', 'category_id');
        $path = public_path('uploads');
        if ($req->file) {
            $image = time() . '-' . $req->file->getClientOriginalName();
            $req->file->move($path, $image);
            $form_data['image'] = $image;
        }


        $product->update($form_data);
        return redirect()->route('product.index')->with('ok','Cập nhật sản phẩm thành công!');
    }

    public function product_delete(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('ok','Xóa sản phẩm thành công!');
        return abort(403);
    }
}