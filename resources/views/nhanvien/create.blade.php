@extends('layout.client')
@section('css')
@endsection

@section('title')
    {{ $title }}
@endsection

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $item)
            <div class="alert alert-danger">{{ $item }}</div>
        @endforeach
    @endif
    <form enctype="multipart/form-data" method="POST" action="{{ route('nhanvien.store') }}">
        @csrf
        <div class="form-group">
            <label for="">Tên nhân viên</label>
            <input type="text" class="form-control" name="ho_ten" placeholder="Nhập họ tên">
        </div>
        <div class="form-group">
            <label for="">Ảnh</label>
            <input type="file" class="form-control" name="anh_dai_dien" placeholder="Nhập số điện thoại">
        </div>
        <div class="form-group">
            <label for="">Số điện thoại</label>
            <input type="text" class="form-control" name="so_dien_thoai" placeholder="Nhập số điện thoại">
        </div>
        <div class="form-group">
            <label for="">Địa chỉ</label>
            <input type="text" class="form-control" name="dia_chi" placeholder="Nhập địa chỉ">
        </div>
        <div>
            <label for="">Bằng cấp</label>
            <select name="bang_cap" class="form-control">
                <option value="THCS">THCS</option>
                <option value="THPT">THPT</option>
                <option value="Cao Đẳng">Cao Đẳng</option>
                <option value="Đại Học">Đại Học</option>
                <option value="Thạc Sĩ">Thạc Sĩ</option>
            </select>
        </div>
        <div>
            <label for="">Chức vụ</label>
            <select name="id_chuc_vus" class="form-control">
                @foreach ($chucVu as $item)
                    <option value="{{ $item->id }}">{{ $item->ten_chuc_vu }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="">Phòng ban</label>
            <select name="id_phong_ban" class="form-control">
                @foreach ($phongBan as $item)
                    <option value="{{ $item->id }}">{{ $item->ten_phong_ban }}</option>
                @endforeach
            </select>
        </div>
        <label for="">Trạng thái</label>
        <div class="radio">
            <select name="trang_thai" class="form-control">
                <option value="1">Hoạt động</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('js')
@endsection
