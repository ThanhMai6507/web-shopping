<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menutype;

class MenuTypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $listmenu = Menutype::orderBy('id')->get();
        return view('admin.menu.index')->with(compact('listmenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.menu.create');
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
                'menutype' => 'required|max:250',
                'slug_menu_type' => 'required|unique:menutype',
                'trangthai' => 'required'
            ],
            [
                'menutype.unique' => 'Tên menu đã có',
                'menutype.required' => 'Điền tên menu',
                'slug_menu_type.unique' => 'Menu type đã có',
                'slug_menu_type.required' => 'Điền slug_type',
            ]
        );

        $menutype = new Menutype();
        $menutype->menu_type = $data['menutype'];
        $menutype->Slug_Menu_type = $data['slug_menu_type'];
        $menutype->Trang_Thai = $data['trangthai'];

        $menutype -> save();

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
        $editmenu = Menutype::find($id);
        return view('admin.menu.edit')->with(compact('editmenu')) ;
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
        
        $data = $request->validate(
            [
                'menutype' => 'required|max:250',
                'slug_menu_type' => 'required|unique:menutype',
                'trangthai' => 'required'
            ],
            [
                'menutype.unique' => 'Tên menu đã có',
                'menutype.required' => 'Điền tên menu',
                'slug_menu_type.unique' => 'Menu type đã có',
                'slug_menu_type.required' => 'Điền slug_type',
            ]
        );

        $menutype = Menutype::find($id);
        $menutype->menu_type = $data['menutype'];
        $menutype->Slug_Menu_type = $data['slug_menu_type'];
        $menutype->Trang_Thai = $data['trangthai'];

        $menutype -> save();

        return redirect()->back()->with('message','Thêm Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menutype::find($id)->delete();
        return redirect()->back()->with('status','Xóa Thành Công');
    }
}
