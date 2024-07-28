<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use App\Models\KhenThuong;
use Illuminate\Http\Request;

class KhenThuongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $data['data'] = KhenThuong::all();

        $data['title'] = 'Trang danh sách khen thưởng';
        // dd($data);
        return view('khenthuong.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $data['title'] = 'Trang thêm khen thưởng';
        // dd($data);
        $data['nhanvien'] = NhanVien::all()
            ->select('id', 'ho_ten');
        return view('khenthuong.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'id_nguoi_khen_thuong' => 'required',
                'id_nhan_vien' => 'required',
                'noi_dung' => 'required',
                'ngay_khen_thuong' => 'required',
            ]
        );
        // dd($data);
        KhenThuong::create($data);
        return redirect()->route('khenthuong.index')->with('success', 'Thêm thành công');
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
        $data['title'] = 'Trang sửa khen thưởng';
        $data['data'] = KhenThuong::with('nhanVien', 'nguoiKhenThuong')->get();
        $data['nhanvien'] = NhanVien::all()
            ->select('id', 'ho_ten');
        // dd($data);
        return view('khenthuong.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'id_nguoi_khen_thuong' => 'required',
                'id_nhan_vien' => 'required',
                'noi_dung' => 'required',
                'ngay_khen_thuong' => 'required',
            ]
        );
        $update = KhenThuong::where('id', $id);
        $update->update($data);
        return redirect()->route('khenthuong.index')->with('success', 'Cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $update = KhenThuong::where('id', $id);
        $update->delete();
        return redirect()->route('khenthuong.index')->with('success', 'Xóa thành công');
    }
}
