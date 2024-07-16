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
    <form enctype="multipart/form-data" method="POST" action="{{ route('chucvu.update', $data[0]->id) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">ID</label>
            <input type="text" class="form-control" name="ten_chuc_vu" value="{{ $data[0]->id }}"
                placeholder="Nhập họ tên chức vụ" readonly>
        </div>
        <div class="form-group">
            <label for="">Tên chức vụ</label>
            <input type="text" class="form-control" name="ten_chuc_vu" value="{{ $data[0]->ten_chuc_vu }}"
                placeholder="Nhập họ tên">
        </div>
        <div class="form-group">
            <label for="">Mô tả</label>
            <input type="text" class="form-control" name="mo_ta" value="{{ $data[0]->mo_ta }}"
                placeholder="Nhập mô tả">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('js')
@endsection
