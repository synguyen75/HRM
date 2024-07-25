<?php

namespace App\Http\Controllers;

use App\Models\NhomNhanVien;
use Illuminate\Http\Request;

class NhomNhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $data['title'] = 'Trang danh sách nhóm';
        $data['data'] = NhomNhanVien::all();
        return view('nhom.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $data['title'] = 'Trang thêm nhóm';
        return view('nhom.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'ten_nhom' => 'required',
                'cong_viec' => 'required',
            ]
        );
        if ($request->mo_ta) {
            $data['mo_ta'] = $request->mo_ta;
        }
        NhomNhanVien::create($data);
        return redirect()->route('nhom.index')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(NhomNhanVien $nhomNhanVien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NhomNhanVien $nhomNhanVien, $id)
    {
        $data = [];
        $data['title'] = 'Trang sửa nhóm';
        $data['data'] = $nhomNhanVien::find($id);
        // dd($data);
        return view('nhom.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'ten_nhom' => 'required',
                'cong_viec' => 'required',
            ]
        );
        if ($request->mo_ta) {
            $data['mo_ta'] = $request->mo_ta;
        }

        NhomNhanVien::where('id', $id)->update($data);
        return redirect()->route('nhom.index')->with('success', 'Thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = NhomNhanVien::where('id', $id);
        $data->delete();
        return redirect()->route('nhom.index')->with('success', 'Xóa thành công');
    }
}
