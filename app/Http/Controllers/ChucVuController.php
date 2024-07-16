<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use Illuminate\Http\Request;

class ChucVuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $data['data'] = ChucVu::all();
        $data['title'] = 'Trang danh sách chức vụ';
        // dd($data);
        return view('chucvu.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $data['title'] = 'Trang thêm chức vụ';
        // dd($data);
        return view('chucvu.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'ten_chuc_vu' => 'required',
                'mo_ta' => 'required',
            ],
            [
                'ten_chuc_vu.required' => 'Chưa nhập tên chức vụ',
                'mo_ta.required' => 'Chưa nhập mô tả',
            ]
        );
        ChucVu::create($data);
        return redirect()->route('chucvu.index')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(ChucVu $chucVu)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChucVu $chucVu, $id)
    {
        $data = [];
        $data['title'] = 'Trang sửa chức vụ';
        $data['data'] = $chucVu::where('id', $id)->get();
        // dd($data);
        return view('chucvu.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChucVu $chucVu, $id)
    {
        $data = $request->validate(
            [
                'ten_chuc_vu' => 'required',
                'mo_ta' => 'required',
            ],
            [
                'ten_chuc_vu.required' => 'Chưa nhập tên chức vụ',
                'mo_ta.required' => 'Chưa nhập mô tả',
            ]
        );
        $update = ChucVu::where('id', $id);
        $update->update($data);
        return redirect()->route('chucvu.index')->with('success', 'Cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChucVu $chucVu, $id)
    {
        $update = ChucVu::where('id', $id);
        $update->delete();
        return redirect()->route('chucvu.index')->with('success', 'Xóa thành công');
    }
}
