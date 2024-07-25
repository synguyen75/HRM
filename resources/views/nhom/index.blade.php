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
    <a href="{{ route('nhom.create') }}" style="margin-bottom: 10px" class="btn btn-warning">Thêm nhóm</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                {{-- <th scope="col">STT</th> --}}
                <th scope="col">ID</th>
                <th scope="col">Tên nhóm</th>
                <th scope="col">Công việc</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Xem thành viên</th>
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
                    <td>{{ $item->ten_nhom }}</td>
                    <td>{{ $item->cong_viec }}</td>
                    <td>{{ $item->mo_ta }}</td>
                    <td style="font-size: x-large"><a href="{{ route('thanhvien.show', $item->id) }}">👁️‍🗨️</a></td>
                    <td>
                        <a href="{{ route('nhom.edit', $item->id) }}" class="btn btn-warning"><i class="pe-7s-pen"
                                style="font-weight: bolder; font-size: 15px"></i></a>
                        <form action="{{ route('nhom.destroy', $item->id) }}"
                            onsubmit="return confirm('Bạn thực sự muốn xóa ?')" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="pe-7s-trash"
                                    style="font-weight: bolder; font-size: 15px"></i></button>
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
