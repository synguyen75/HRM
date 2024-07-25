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
    <p class="label label-info" style="font-size:medium; background-color: #97a197">ID nhân viên: {{ $nhanVien->id }}</p>
    <p class="label label-info" style="font-size:medium; background-color: #97a197">Họ tên: {{ $nhanVien->ho_ten }} </p> <br>
    <a href="{{ route('luong.up', $nhanVien->id) }}" style="margin-top: 20px" class="btn btn-warning">Chấm công</a>
    <table class="table" style="margin-top: 20px">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                {{-- <th scope="col">ID</th> --}}
                <th scope="col">Lương theo ngày</th>
                <th scope="col">Ngày công</th>
                <th scope="col">Lương tháng</th>
                <th scope="col">Ngày chấm</th>
                <th scope="col">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
                <tr>
                    <th scope="row">{{ (int) $key + 1 }}</th>
                    {{-- <th scope="row">{{ $item->id }}</th> --}}
                    <td>{{ $item->muc_luong_theo_ngay }} VNĐ</td>
                    <td>{{ $item->ngay_cong }} Ngày</td>
                    <td>{{ $item->muc_luong }} VNĐ</td>
                    <td>{{ $item->ngay_hieu_luc }}</td>
                    <td>
                        <a href="{{ route('luong.edit', $item->id) }}" class="btn btn-warning"><i class="pe-7s-pen"
                                style="font-weight: bolder; font-size: 15px"></i></a>
                        {{-- <form action="{{ route('luong.destroy', $item->id) }}"
                            onsubmit="return confirm('Bạn thực sự muốn xóa ?')" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
            {{-- {{ $data->links('pagination::bootstrap-4') }} --}}
        </tbody>
    </table>
@endsection

@section('js')
@endsection
