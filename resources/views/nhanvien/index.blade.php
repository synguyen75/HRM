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
    <a href="{{ route('nhanvien.create') }}" class="btn btn-warning">Thêm nhân viên</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                {{-- <th scope="col">STT</th> --}}
                <th scope="col">ID</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Ảnh đại diện</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Bằng cấp</th>
                <th scope="col">Phòng ban</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Lương</th>
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
                    <td>{{ $item->ho_ten }}</td>
                    <td><img src="{{ asset($item->anh_dai_dien) }}" alt="" style="width: 50px; height: 50px;"></td>
                    <td>{{ $item->so_dien_thoai }}</td>
                    <td>{{ $item->dia_chi }}</td>
                    <td>{{ $item->bang_cap }}</td>
                    <td>{{ $item->ten_phong_ban }}</td>
                    <td>{{ $item->ten_chuc_vu }}</td>
                    <td>
                        @if ($item->trang_thai)
                            <span class="badge badge-success" style="background-color: rgb(3, 197, 3)">Hoạt động</span>
                        @else
                            <span class="badge badge-success" style="background-color: rgb(230, 45, 45)">Nghỉ việc</span>
                        @endif
                    </td>
                    <td style="font-size: x-large"><a href="{{ route('luong.get', $item->id) }}">👁️‍🗨️</a></td>
                    <td>
                        <a href="{{ route('nhanvien.edit', $item->id) }}" class="btn btn-warning"><i class="pe-7s-pen"
                                style="font-weight: bolder; font-size: 15px"></i></a>
                        <form action="{{ route('nhanvien.destroy', $item->id) }}"
                            onsubmit="return confirm('Bạn thực sự muốn xóa ?')" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i style="font-weight: bolder; font-size: 15px"
                                    class="pe-7s-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            {{ $data->links('pagination::bootstrap-4') }}
        </tbody>
    </table>
@endsection

@section('js')
@endsection
