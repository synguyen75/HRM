<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use App\Models\PhongBan;
use Illuminate\Http\Request;

class PhongBanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $data['data'] = PhongBan::all();
        $data['title'] = 'Trang danh sách phòng ban';
        // dd($data);
        return view('phongBan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $data['title'] = 'Trang thêm phòng ban';
        // dd($data);
        return view('phongban.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'ten_phong_ban' => 'required',
            ],
            [
                'ten_phong_ban.required' => 'Chưa nhập tên phòng ban',
            ]
        );
        PhongBan::create($data);
        return redirect()->route('phongban.index')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(PhongBan $phongBan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhongBan $phongBan, $id)
    {
        $data = [];
        $data['title'] = 'Trang sửa chức vụ';
        $data['data'] = $phongBan::where('id', $id)->get();
        // dd($data);
        return view('phongban.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhongBan $phongBan, $id)
    {
        $data = $request->validate(
            [
                'ten_phong_ban' => 'required',
            ],
            [
                'ten_phong_ban.required' => 'Chưa nhập tên phòng ban',
            ]
        );
        $update = PhongBan::where('id', $id);
        $update->update($data);
        return redirect()->route('phongban.index')->with('sessces', 'Cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhongBan $phongBan, $id)
    {
        $data = PhongBan::where('id', $id);
        $data->delete();
        return redirect()->route('phongban.index')->with('success', 'Xóa thành công');
    }
}
