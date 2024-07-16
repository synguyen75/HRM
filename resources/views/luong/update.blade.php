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
        <p class="label label-info" style="font-size:medium; background-color: #97a197">ID nhân viên:
            {{ $data[0]->id_nhan_vien }}</p>
        <p class="label label-info" style="font-size:medium; background-color: #97a197">Họ tên: {{ $data[0]->ho_ten }} </p>
    </div>
    <form enctype="multipart/form-data" method="POST" action="{{ route('luong.update', $data[0]->id) }}">
        @method('PUT')
        @csrf
        <input type="text" value="{{ $data[0]->id_nhan_vien }}" name="id_nhan_vien" hidden>
        <div class="form-group">
            <label for="">ID</label>
            <input type="text" class="form-control" name="id" value="{{ $data[0]->id }}"
                placeholder="Nhập họ tên chức vụ" readonly>
        </div>
        <div class="form-group">
            <label for="">Lương theo ngày</label>
            <input type="text" class="form-control" name="muc_luong_theo_ngay"
                value="{{ $data[0]->muc_luong_theo_ngay }}" placeholder="Nhập họ tên phòng ban">
        </div>
        <div class="form-group">
            <label for="">Ngày công</label>
            <input type="number" class="form-control" name="ngay_cong" value="{{ $data[0]->ngay_cong }}"
                placeholder="Số ngày công" max="31">
        </div>
        <div class="form-group">
            <label for="">Ngày chấm</label>
            <input type="date" class="form-control" name="ngay_hieu_luc" value="{{ $data[0]->ngay_hieu_luc }}"
                placeholder="Số ngày công">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('js')
@endsection
