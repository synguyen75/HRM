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
    <form enctype="multipart/form-data" method="POST" action="{{ route('nhanvien.update', $data[0]->id) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">ID</label>
            <input type="text" class="form-control" name="id" value="{{ $data[0]->id }}" placeholder="Nhập họ tên"
                disabled>
        </div>
        <div class="form-group">
            <label for="">Tên nhân viên</label>
            <input type="text" class="form-control" name="ho_ten" value="{{ $data[0]->ho_ten }}"
                placeholder="Nhập họ tên">
        </div>
        <div class="form-group">
            <label for="">Ảnh</label><br>
            <img src="{{ asset($data[0]->anh_dai_dien) }}" style="width: 50px; height: 50px;" alt="">
            <input type="file" class="form-control" name="anh_dai_dien" placeholder="Nhập số điện thoại">
        </div>
        <div class="form-group">
            <label for="">Số điện thoại</label>
            <input type="text" class="form-control" name="so_dien_thoai" value="{{ $data[0]->so_dien_thoai }}"
                placeholder="Nhập số điện thoại">
        </div>
        <div class="form-group">
            <label for="">Địa chỉ</label>
            <input type="text" class="form-control" value="{{ $data[0]->dia_chi }}" name="dia_chi"
                placeholder="Nhập địa chỉ">
        </div>
        <div>
            <label for="">Bằng cấp</label>
            <select name="bang_cap" class="form-control">
                <option value="THCS" @selected($data[0]->bang_cap == 'THCS')>THCS
                </option>
                <option value="THPT" @selected($data[0]->bang_cap == 'THPT')>THPT</option>
                <option value="Cao Đẳng" @if ($data[0]->bang_cap == 'Cao Đẳng') selected @endif>Cao Đẳng</option>
                <option value="Đại Học" @if ($data[0]->bang_cap == 'Đại Học') selected @endif>Đại Học</option>
                <option value="Thạc Sĩ" @if ($data[0]->bang_cap == 'Thạc Sĩ') selected @endif>Thạc Sĩ</option>
            </select>
        </div>
        <div>
            <label for="">Chức vụ</label>
            <select name="id_chuc_vus" class="form-control">
                @foreach ($chucVu as $item)
                    <option value="{{ $item->id }}" @selected($data[0]->id_chuc_vus == $item->id)>{{ $item->ten_chuc_vu }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="">Phòng ban</label>
            <select name="id_phong_ban" class="form-control">
                @foreach ($phongBan as $item)
                    <option value="{{ $item->id }}" @selected($data[0]->id_phong_ban == $item->id)>{{ $item->ten_phong_ban }}</option>
                @endforeach
            </select>
        </div>
        <label for="">Trạng thái</label>
        <div class="radio">
            <select name="trang_thai" class="form-control">
                <option value="1" {{ $data[0]->trang_thai == 1 ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ $data[0]->trang_thai == 0 ? 'selected' : '' }}>Nghỉ việc</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('js')
@endsection
