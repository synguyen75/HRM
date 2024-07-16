<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $table;
    public function __construct()
    {
        $this->table = new NhanVien();
    }
    public function index()
    {
        $data = [];
        $data['data'] = $this->table->listUser();
        $data['title'] = 'Trang danh sách nhân viên';
        return view('nhanvien.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $data['phongBan'] = $this->table->getPhongBan();
        $data['chucVu'] = $this->table->getChucVu();
        $data['title'] = "Trang thêm tài khoản Admin";
        return view('nhanvien.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'ho_ten' => 'required',
                'so_dien_thoai' => 'required',
                'dia_chi' => 'required',
                'id_chuc_vus' => 'required',
                'id_phong_ban' => 'required',
                'bang_cap' => 'required',
                'trang_thai' => 'required',
            ],
            [
                'ho_ten.required' => 'Chưa nhập họ tên',
                'dia_chi.required' => 'Chưa nhập địa chỉ',
                'so_dien_thoai.required' => 'Chưa nhập số điện thoại',
            ]
        );
        if ($request->hasFile('anh_dai_dien')) {
            $img = $request->file('anh_dai_dien');
            $path = $img->store('/images', 'public');
            $data['anh_dai_dien'] = 'storage/' . $path;
        }
        // dd($data);
        $this->table->createUser($data);
        return redirect()->route('nhanvien.index')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [];
        $data['title'] = 'Trang chỉnh sửa nhân viên';
        $data['data'] = $this->table->showUser($id);
        $data['phongBan'] = $this->table->getPhongBan();
        $data['chucVu'] = $this->table->getChucVu();
        return view('nhanvien.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'ho_ten' => 'required',
                'so_dien_thoai' => 'required',
                'dia_chi' => 'required',
                'id_chuc_vus' => 'required',
                'id_phong_ban' => 'required',
                'bang_cap' => 'required',
                'trang_thai' => 'required',
            ],
            [
                'ho_ten.required' => 'Chưa nhập họ tên',
                'dia_chi.required' => 'Chưa nhập địa chỉ',
                'so_dien_thoai.required' => 'Chưa nhập số điện thoại',
            ]
        );
        if ($request->hasFile('anh_dai_dien')) {
            $img = $request->file('anh_dai_dien');
            $path = $img->store('/images', 'public');
            $data['anh_dai_dien'] = 'storage/' . $path;
        }
        // dd($data);
        $this->table->updateUser($data, $id);
        return redirect()->route('nhanvien.index')->with('sessces', 'Cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->table->deleteUser($id);
        return redirect()->route('nhanvien.index')->with('success', 'Xóa thành công');
    }
}
