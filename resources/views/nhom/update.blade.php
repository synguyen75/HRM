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
    <form enctype="multipart/form-data" method="POST" action="{{ route('nhom.update', $data->id) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">ID</label>
            <input type="text" class="form-control" name="id" value="{{ $data->id }}"
                placeholder="Nhập họ tên chức vụ" readonly>
        </div>
        <div class="form-group">
            <label for="">Tên chức vụ</label>
            <input type="text" class="form-control" name="ten_nhom" value="{{ $data->ten_nhom }}"
                placeholder="Nhập họ tên">
        </div>
        <div class="form-group">
            <label for="">Công việc</label>
            <input type="text" class="form-control" name="cong_viec" value="{{ $data->cong_viec }}"
                placeholder="Nhập họ tên">
        </div>
        <div class="form-group">
            <label for="">Mô tả</label>
            <textarea id="description" class="form-control" name="mo_ta" rows="3" placeholder="Mô tả" cols="50">{{ $data->mo_ta }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('js')
@endsection
