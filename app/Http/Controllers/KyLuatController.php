<?php

namespace App\Http\Controllers;

use App\Models\KyLuat;
use App\Models\NhanVien;
use Illuminate\Http\Request;

class KyLuatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $data['data'] = KyLuat::all();

        $data['title'] = 'Trang danh sách kỷ luật';
        // dd($data);
        return view('KyLuat.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $data['title'] = 'Trang thêm kỷ luật';
        // dd($data);
        $data['nhanvien'] = NhanVien::all()
            ->select('id', 'ho_ten');
        return view('KyLuat.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'id_nguoi_thuc_hien' => 'required',
                'id_nhan_vien' => 'required',
                'noi_dung' => 'required',
                'ngay_ky_luat' => 'required',
            ]
        );
        // dd($data);
        KyLuat::create($data);
        return redirect()->route('kyluat.index')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = [];
        $data['title'] = 'Trang sửa kỷ luật';
        $data['data'] = KyLuat::with('nhanVien', 'nguoiKyLuat')->get();
        $data['nhanvien'] = NhanVien::all()
            ->select('id', 'ho_ten');
        // dd($data);
        return view('kyluat.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'id_nguoi_thuc_hien' => 'required',
                'id_nhan_vien' => 'required',
                'noi_dung' => 'required',
                'ngay_ky_luat' => 'required',
            ]
        );
        $update = KyLuat::where('id', $id);
        $update->update($data);
        return redirect()->route('kyluat.index')->with('success', 'Cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $update = KyLuat::where('id', $id);
        $update->delete();
        return redirect()->route('kyluat.index')->with('success', 'Xóa thành công');
    }
}
