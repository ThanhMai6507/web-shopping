<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CouponModel;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = CouponModel::orderBy('id','DESC')->get();
        //dd($coupons);
        return view('admin.coupon.index')->with(compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create');
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
                'name_coupon' => 'required|unique:coupon|max:250',
                'code_coupon' => 'required|unique:coupon|max:250',
                'coupon_time' => 'required',
                'coupon_condition' => 'required',
                'coupon_number' => 'required',

            ],[
                'name_coupon.unique' => 'Tên Danh Mục Đã Có',
                'code_coupon.unique' => 'Slug Danh Mục Đã Có',
                'name_coupon.required' => 'Điền Tên Mã Giảm GIá',
                'code_coupon.required' => 'Điền Code Mã Giảm',
                'coupon_time.required' => 'Điền Số Lượng',
                'coupon_number.required' => 'Điền Số Tiền Giảm',
            ]
        );
        $coupon = new CouponModel();
        $coupon-> name_coupon = $data['name_coupon'];
        $coupon-> code_coupon = $data['code_coupon'];
        $coupon-> coupon_time = $data['coupon_time'];
        $coupon-> coupon_condition = $data['coupon_condition'];
        $coupon-> coupon_number = $data['coupon_number'];
        $coupon->save();
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
        $couponDelete = CouponModel::find($id)->delete();
        return redirect()->back()->with('status','Xóa Thành Công');
    }
}
