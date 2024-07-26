@extends('layout.client')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
    <div style="margin-bottom: 20px">
        <p class="label label-info" style="font-size:medium; background-color: #97a197">ID nhóm:
            {{ $nhom->id }}</p>
        <p class="label label-info" style="font-size:medium; background-color: #97a197">Tên nhóm: {{ $nhom->ten_nhom }} </p>
    </div>
    <a href="{{ route('thanhvien.show', $nhom->id) }}" style="margin: 10px 0 20px 0" class="btn btn-primary">Quay lại nhóm</a>

    <form enctype="multipart/form-data" method="POST" action="{{ route('thanhvien.update', $nhom->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">ID nhóm</label>
            <input type="text" class="form-control" name="ten_nhom" value="{{ $nhom->id }}"
                placeholder="Nhập họ tên chức vụ" required readonly>
        </div>
        <input type="hidden" name="nhom_nhan_vien_id" value="{{ $nhom->id }}">
        <div class="form-group">
            <label for="">Phân công công việc</label>
            <input type="text" class="form-control" name="phan_viec" value="{{ old('phan_viec') }}"
                placeholder="Nhập họ tên chức vụ" required>
        </div>
        <div class="form-group">
            <label for="">Nhân viên</label>
            <select id="nhan_vien_id" class="form-control" name="nhan_vien_id" required>
                <option value="0" disabled selected>Chọn nhân viên</option>
                @foreach ($nhanvien as $employee)
                    <option value="{{ $employee['id'] }}">{{ $employee['ho_ten'] }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#nhan_vien_id').select2();
        });
    </script>
@endsection
