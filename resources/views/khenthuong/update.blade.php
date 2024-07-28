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
    <form enctype="multipart/form-data" method="POST" action="{{ route('khenthuong.update', $data[0]->id) }}">
        @csrf
        @method('Put')
        <div class="form-group">
            <label for="">Tên người khen thưởng</label>
            <select id="nguoi_duoc_khen_thuong" class="form-control" name="id_nguoi_khen_thuong" required>
                @foreach ($nhanvien as $employee)
                    <option value="{{ $employee['id'] }}" @selected($data[0]->nguoiKhenThuong->id == $employee['id'])>{{ $employee['ho_ten'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Tên người được khen thưởng</label>
            <select id="nhan_vien_id" class="form-control" name="id_nhan_vien" required>
                @foreach ($nhanvien as $employee)
                    <option value="{{ $employee['id'] }}" @selected($data[0]->nhanVien->id == $employee['id'])>{{ $employee['ho_ten'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Nội dung khen thưởng</label>
            <textarea name="noi_dung" id="editor1" required>{{ $data[0]->noi_dung }}</textarea>
        </div>
        <div class="form-group">
            <label for="">Ngày khen thưởng</label>
            <input type="text" class="form-control" value="{{ $data[0]->ngay_khen_thuong }}" name="ngay_khen_thuong"
                placeholder="Ngày khen thưởng" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('js')
    {{-- // Text Editor --}}
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor1');
    </script>

    {{-- // Select 2 --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script type="text/javascript">
        $(document).ready(function() {
            $('#nhan_vien_id').select2();
            $('#nguoi_duoc_khen_thuong').select2();
        });
    </script>
@endsection
