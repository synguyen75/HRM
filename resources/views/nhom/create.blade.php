@extends('layout.client')
@section('css')
@endsection

@section('title')
    {{ $title }}
@endsection

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $item)
            <div class="alert alert-danger">
                {{ $item }}</div>
        @endforeach
    @endif
    <form enctype="multipart/form-data" method="POST" action="{{ route('nhom.store') }}">
        @csrf
        <div class="form-group">
            <label for="">Tên nhóm</label>
            <input type="text" class="form-control" name="ten_nhom" value="{{ old('ten_nhom') }}"
                placeholder="Nhập họ tên chức vụ" required>
        </div>
        <div class="form-group">
            <label for="">Công việc</label>
            <input type="text" class="form-control" name="cong_viec" placeholder="Nhập họ tên chức vụ"
                value="{{ old('cong_viec') }}" required>
        </div>
        <div class="form-group">
            <label for="">Mô tả</label>
            <textarea id="description" class="form-control" name="mo_ta" rows="3" placeholder="Mô tả" cols="50">
@if (old('mo_ta'))
{{ old('mo_ta') }}
@endif
</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('js')
@endsection
