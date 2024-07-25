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
    <p class="label label-info" style="font-size:medium; background-color: #97a197">ID nhóm: {{ $nhom->id }}</p>
    <p class="label label-info" style="font-size:medium; background-color: #97a197">Tên nhóm: {{ $nhom->ten_nhom }} </p>
    <br>
    <a href="{{ route('thanhvien.edit', $nhom->id) }}" style="margin-top: 20px" class="btn btn-warning">Thêm thành viên</a>
    <table class="table" style="margin-top: 20px">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                {{-- <th scope="col">ID</th> --}}
                <th scope="col">Họ tên</th>
                <th scope="col">Ảnh thẻ</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Phòng ban</th>
                <th scope="col">Công việc</th>
                <th scope="col">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($thanhVien as $key => $item)
                <tr>
                    <th scope="row">{{ (int) $key + 1 }}</th>
                    {{-- <th scope="row">{{ $item->id }}</th> --}}
                    <td>{{ $item->nhanVien->ho_ten }}</td>
                    <td><img src="{{ asset($item->nhanVien->anh_dai_dien) }}" alt=""
                            style="width: 50px; height: 50px;"></td>
                    <td>{{ $item->nhanVien->phongBan->ten_phong_ban }}</td>
                    <td>{{ $item->nhanVien->chucVu->ten_chuc_vu }}</td>
                    <td>{{ $item->phan_viec }}</td>
                    <td>
                        {{-- <a href="{{ route('luong.edit', $item->id) }}" class="btn btn-warning"><i class="pe-7s-pen"
                                style="font-weight: bolder; font-size: 15px"></i></a> --}}
                        <form action="{{ route('thanhvien.destroy', $item->id) }}"
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
