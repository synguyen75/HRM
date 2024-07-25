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
    <div style="margin-bottom: 20px">
        <p class="label label-info" style="font-size:medium; background-color: #97a197">ID nhóm:
            {{ $nhom->id }}</p>
        <p class="label label-info" style="font-size:medium; background-color: #97a197">Tên nhóm: {{ $nhom->ten_nhom }} </p>
    </div>
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
            <label for="">ID Nhân viên</label>
            <input type="text" class="form-control" name="nhan_vien_id" placeholder="Nhập họ tên chức vụ"
                value="{{ old('cong_viec') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('js')
@endsection
