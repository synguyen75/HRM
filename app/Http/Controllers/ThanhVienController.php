<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThanhVienRequest;
use App\Models\NhanVien;
use App\Models\NhomNhanVien;
use App\Models\ThanhVien;
use Illuminate\Http\Request;

class ThanhVienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [];
        $data['nhom'] = NhomNhanVien::find($id);
        $data['title'] = 'Trang danh sách thành viên';
        $data['thanhVien'] = ThanhVien::with('nhanVien.phongBan', 'nhanVien.chucVu')
            ->where('nhom_nhan_vien_id', $id)
            ->get();
        // dd($data);
        return view('thanhvien.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [];
        $data['nhom'] = NhomNhanVien::find($id);
        $data['nhanvien'] = NhanVien::all()
            ->select('id', 'ho_ten');
        // dd($data);
        $data['title'] = 'Trang thêm thành viên';
        return view('thanhvien.create', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ThanhVienRequest $request, string $id)
    {
        $data = $request->except('_token', '_method');
        // dd($data);
        ThanhVien::create($data);
        return redirect()->route('thanhvien.show', $id)->with('success', 'Thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ThanhVien::where('id', $id);
        $id_nhom = $data->get();
        $data->delete();
        return redirect()->route('thanhvien.show', $id_nhom[0]->nhom_nhan_vien_id)->with('success', 'Xóa thành công');
    }
}
