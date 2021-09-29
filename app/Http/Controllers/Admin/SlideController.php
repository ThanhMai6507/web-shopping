<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;

class SlideController extends Controller
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
        $listslide = SlideModel::orderBy('id','DESC')->get();
        return view('admin.Slide.index')->with(compact('listslide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'ten_slide' => 'required|unique:slide_models|max:250',
                'img_slide' => 'required|image|mimes:jgp,png,jpeg,git,svg|max:4048|dimensions:min_width=100,min_height=100,max_width=10000,max_height=10000',
                'trangthai'=> 'required',
            ],
            [
                'ten_slide.required' => 'Tên slide ',
                'ten_slide.unique' => 'Tên slide Đã Có',
                'img_slide.required' => 'Phai Co hinh anh ',
            ]
        );
        
        $slide = new SlideModel();
        $slide->ten_slide = $data['ten_slide'];
        $slide->trang_thai  = $data['trangthai'];

        //upload img
        $get_image = $request -> img_slide;
        $path = 'public/uploads/slide/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image-> move($path,$new_image);

        $slide-> img_slide = $new_image;

        $slide -> save();

        return redirect()->back()->with('message','Thêm Thành Công');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slidedelete = SlideModel::find($id);
        $path = 'public/uploads/slide/'.$slidedelete->img_slide;
        if(file_exists($path)){
            unlink($path);
        }
        SlideModel::find($id)->delete();
        return redirect()->back()->with('status','Xóa Thành Công');
    }
}
