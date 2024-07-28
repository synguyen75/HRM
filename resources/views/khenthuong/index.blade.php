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
    <a href="{{ route('khenthuong.create') }}" style="margin-bottom: 10px" class="btn btn-warning">Thêm phòng ban</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                {{-- <th scope="col">STT</th> --}}
                <th scope="col">ID</th>
                <th scope="col">Tên Người khen thưởng</th>
                <th scope="col">Tên Người được khen thưởng</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Ngày khen thưởng</th>
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
                    <td>{{ $item->nguoiKhenThuong->ho_ten }}</td>
                    <td>{{ $item->nhanVien->ho_ten }}</td>
                    <td>{!! $item->noi_dung !!}</td>
                    <td>{{ $item->ngay_khen_thuong }}</td>

                    <td>
                        <a href="{{ route('khenthuong.edit', $item->id) }}" class="btn btn-warning"><i class="pe-7s-pen"
                                style="font-weight: bolder; font-size: 15px"></i></a>
                        <form action="{{ route('khenthuong.destroy', $item->id) }}"
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
