<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $list_product = ProductModel::orderBy('id')->get();
        $list_product = ProductModel::with('product_category')->orderBy('id','DESC')->paginate(12);
        //dd($list_product);
        return view('admin.product.index')->with(compact('list_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $category_product = CategoryModel::orderby('id')->get();
        return view('admin.product.create')->with(compact('category_product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request-> validate(
                [
                    'name_product' => 'required|unique:product|max:250',
                    'slug_product' => 'required|unique:product|max:250',
                    'code' => 'required',
                    'description' => 'required',
                    'img_product' => 'required|image|mimes:jgp,png,jpeg,git,svg|max:4048|dimensions:min_width=100,min_height=100,max_width=10000,max_height=10000',   
                    'price' => 'required',
                    'category_product_id' => 'required',
                    'detail' => 'required|min:100', 
                    'trangthai' => 'required',
                    'hot' => 'required',
                ],
                [
                    'name_product.unique' => 'Tên Sản Phẩm đã có',
                    'name_product.required' => 'Điền tên Sản Phẩm',
                    'slug_product.unique' => 'Slug đã có',
                    'slug_product.required' => 'Điền Slug Sản Phẩm',
                    'code.unique' => 'Code đã có',
                    'code.required' => 'Điền code Sản Phẩm',
                    'description.unique' => 'Tóm Tắt đã có',
                    'description.required' => 'Điền Tóm Tắt Sản Phẩm',
                    'img_product.unique' => 'img đã có',
                    'img_product.required' => 'Ảnh Sản Phẩm',
                    'price.unique' => 'Giá đã có',
                    'price.required' => 'Điền Giá Sản Phẩm',
                    'detail.unique' => 'Chi tiêt đã có',
                    'detail.required' => 'Điền Chi tiêt Sản Phẩm',
                ]          
            );

            $product = new ProductModel();
            $product -> name_product = $data['name_product'];
            $product -> slug_product = $data['slug_product'];
            $product -> code         = $data['code'];
            $product -> description = $data['description'];
            $product -> price       = $data['price'];
            $product -> category_id = $data['category_product_id'];
            $product -> detail      = $data['detail'];
            $product -> hot      =  $data['hot'];
            $product -> status      = $data['trangthai'];
            //them anh 
            $get_image = $request -> img_product;
            $path = 'public/uploads/product/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image-> move($path,$new_image);
            $product-> img_product = $new_image;

            $product -> save();
            return redirect()->back()->with('message','Cap nhap Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_product_edit = CategoryModel::orderBy('id')->get();
        $product_edit = ProductModel::find($id);
        return view('admin.product.edit')->with(compact('product_edit','category_product_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request-> validate(
            [
                'name_product' => 'required|unique:product|max:250',
                'slug_product' => 'required|unique:product|max:250',
                'code' => 'required',
               // 'description' => 'required',
                //'img_product' => 'required|image|mimes:jgp,png,jpeg,git,svg|max:4048|dimensions:min_width=100,min_height=100,max_width=10000,max_height=10000',   
                //'price' => 'required',
                'category_product_id' => 'required',
               // 'detail' => 'required|min:100',
                'trangthai' => 'required',
            ],
            [
                'name_product.unique' => 'Tên Sản Phẩm đã có',
                'name_product.required' => 'Điền tên Sản Phẩm',
                'slug_product.unique' => 'Slug đã có',
                'slug_product.required' => 'Điền Slug Sản Phẩm',
                'code.unique' => 'Code đã có',
                'code.required' => 'Điền code Sản Phẩm',
                'description.unique' => 'Tóm Tắt đã có',
                'description.required' => 'Điền Tóm Tắt Sản Phẩm',
                'img_product.unique' => 'img đã có',
                'img_product.required' => 'Ảnh Sản Phẩm',
                'price.unique' => 'Giá đã có',
                'price.required' => 'Điền Giá Sản Phẩm',
                'detail.unique' => 'Chi tiêt đã có',
                'detail.required' => 'Điền Chi tiêt Sản Phẩm',
            ]          
        );

        $product =  ProductModel::find($id);
        $product -> name_product = $data['name_product'];
        $product -> slug_product = $data['slug_product'];
        $product -> code         = $data['code'];
        $product -> description = $data['description'];
        $product -> price       = $data['price'];
        $product -> category_id = $data['category_product_id'];
        $product -> detail      = $data['detail'];
        $product -> status      = $data['trangthai'];
        //cap nhap anh
        $get_image = $request -> img_product;
        if($get_image){
        $path = 'public/uploads/product/'.$product->img_product;
        if(file_exists($path)){
            unlink($path);
        }
        $path = 'public/uploads/product/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image-> move($path,$new_image);
     }
        $product -> save();
        return redirect()->back()->with('message','Cap nhap Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productdelete = ProductModel::find($id);
        $path = 'public/uploads/product/'.$productdelete->img_product;
        if(file_exists($path)){
            unlink($path);
        }
        ProductModel::find($id)->delete();
        return redirect()->back()->with('status','Xóa Thành Công');

    }
}
