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
    <a href="{{ route('chucvu.create') }}" style="margin-bottom: 10px" class="btn btn-warning">Thêm chức vụ</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                {{-- <th scope="col">STT</th> --}}
                <th scope="col">ID</th>
                <th scope="col">Tên chức vụ</th>
                <th scope="col">Mô tả</th>
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
                    <td>{{ $item->ten_chuc_vu }}</td>
                    <td>{{ $item->mo_ta }}</td>
                    <td>
                        <a href="{{ route('chucvu.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('chucvu.destroy', $item->id) }}"
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
