<?php

namespace App\Http\Controllers;

use App\Models\Luong;
use App\Models\NhanVien;
use Illuminate\Http\Request;

class LuongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data = [];
        $data['id'] = $id;
        $data['nhanVien'] = NhanVien::where('id', $id)
            ->select('id', 'ho_ten')
            ->first();
        $data['data'] = Luong::where('id_nhan_vien', $id)->get();
        $data['title'] = 'Trang danh sách lương';
        // dd($data);
        return view('luong.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $data = [];
        $data['title'] = 'Trang thêm lương';
        $data['data'] = Luong::where('id_nhan_vien', $id)
            ->join('nhan_viens', 'luongs.id_nhan_vien', '=', 'nhan_viens.id')
            ->select('luongs.id_nhan_vien', 'nhan_viens.ho_ten')
            ->get();
        // dd($data);
        return view('luong.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [];
        $data = $request->validate(
            [
                'muc_luong_theo_ngay' => 'required',
                'ngay_hieu_luc' => 'required',
                'ngay_cong' => 'required',
                'id_nhan_vien' => 'required'
            ],
            [
                'muc_luong_theo_ngay' => 'Chưa nhập lương theo ngày',
                'ngay_hieu_luc' => 'Chưa nhập ngày chấm',
                'ngay_cong' => 'Chưa nhập ngày công',
            ]
        );
        $data['muc_luong'] = $data['muc_luong_theo_ngay'] * $data['ngay_cong'];
        // dd($data);   
        Luong::create($data);
        return redirect()->route('luong.get', $request->id_nhan_vien)->with('success', 'Thêm  thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Luong $luong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = [];
        $data['title'] = 'Trang cập nhập lương';
        $data['data'] = Luong::where('luongs.id', $id)
            ->join('nhan_viens', 'luongs.id_nhan_vien', '=', 'nhan_viens.id')
            ->select('luongs.*', 'nhan_viens.ho_ten')
            ->get();
        // dd($data);
        return view('luong.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'muc_luong_theo_ngay' => 'required',
                'ngay_hieu_luc' => 'required',
                'ngay_cong' => 'required',
            ],
            [
                'muc_luong_theo_ngay' => 'Chưa nhập lương theo ngày',
                'ngay_hieu_luc' => 'Chưa nhập ngày chấm',
                'ngay_cong' => 'Chưa nhập ngày công',
            ]
        );
        $update = Luong::where('id', $id);
        $update->update($data);
        return redirect()->route('luong.get', $request->id_nhan_vien)->with('success', 'Cập nhập thành công');
        // $update = 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Luong $luong, $id)
    {
    }
}
