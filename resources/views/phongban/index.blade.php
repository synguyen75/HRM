@extends('layout.client')
@section('css')
@endsection

@section('title')
    {{ $title }}
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('phongban.create') }}" style="margin-bottom: 10px" class="btn btn-warning">Thêm phòng ban</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                {{-- <th scope="col">STT</th> --}}
                <th scope="col">ID</th>
                <th scope="col">Tên phòng ban</th>
                <th scope="col">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            {{-- @php
                $page = $data->currentPage();
                $perPage = $data->perPage();
                $start = ($page - 1) * 10;
            @endphp --}}
            @foreach ($data as $key => $item)
                <tr>
                    {{-- <th scope="row">{{ (int) $key + 1 + $start }}</th> --}}
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->ten_phong_ban }}</td>
                    <td>
                        <a href="{{ route('phongban.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('phongban.destroy', $item->id) }}"
                            onsubmit="return confirm('Bạn thực sự muốn xóa ?')" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            {{-- {{ $data->links('pagination::bootstrap-4') }} --}}
        </tbody>
    </table>
@endsection

@section('js')
@endsection
