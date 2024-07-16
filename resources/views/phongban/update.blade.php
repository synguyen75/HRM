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
    <form enctype="multipart/form-data" method="POST" action="{{ route('phongban.update', $data[0]->id) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">ID</label>
            <input type="text" class="form-control" name="id" value="{{ $data[0]->id }}"
                placeholder="Nhập họ tên chức vụ" readonly>
        </div>
        <div class="form-group">
            <label for="">Tên phòng ban</label>
            <input type="text" class="form-control" name="ten_phong_ban" value="{{ $data[0]->ten_phong_ban }}"
                placeholder="Nhập họ tên phòng ban">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('js')
@endsection
