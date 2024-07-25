<div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
Tip 2: you can also add an image using data-image tag

-->

    <div class="sidebar-wrapper">
        <div class="logo">

            <a href="#" class="simple-text">
                Công Ty Thanh Long
            </a>
        </div>

        <ul class="nav">
            <li @if (request()->is('/')) class="active" @endif>
                <a href="{{ route('dashbroad') }}">
                    <i class="pe-7s-graph"></i>
                    <p>Thống kê</p>
                </a>
            </li>
            <li @if (request()->is('nhanvien/*') || request()->is('nhanvien')) class="active" @endif>
                <a href="{{ route('nhanvien.index') }}">
                    <i class="pe-7s-id"></i>
                    <p>Nhân viên</p>
                </a>
            </li>
            <li @if (request()->is('chucvu/*') || request()->path() == 'chucvu') class="active" @endif>
                <a href="{{ route('chucvu.index') }}">
                    <i class="pe-7s-note2"></i>
                    <p>Chức vụ</p>
                </a>
            </li>
            <li @if (request()->is('phongban/*') || request()->path() == 'phongban') class="active" @endif>
                <a href="{{ route('phongban.index') }}">
                    <i class="pe-7s-network"></i>
                    <p>Phòng ban</p>
                </a>
            </li>
            <li @if (request()->is('nhom/*') || request()->path() == 'nhom') class="active" @endif>
                <a href="{{ route('nhom.index') }}">
                    <i class="pe-7s-users"></i>
                    <p>Nhóm</p>
                </a>
            </li>
            <li @if (request()->is('khenthuong/*') || request()->path() == 'khenthuong') class="active" @endif>
                <a href="{{ route('khenthuong.index') }}">
                    <i class="pe-7s-medal"></i>
                    <p>Khen thưởng</p>
                </a>
            </li>
            <li @if (request()->is('kyluat/*') || request()->path() == 'kyluat') class="active" @endif>
                <a href="{{ route('kyluat.index') }}">
                    <i class="pe-7s-attention"></i>
                    <p>Kỷ luật</p>
                </a>
            </li>
            <li @if (request()->is('taikhoan/*') || request()->path() == 'taikhoan') class="active" @endif>
                <a href="{{ route('taikhoan.index') }}">
                    <i class="pe-7s-user"></i>
                    <p>Tài khoản</p>
                </a>
            </li>
        </ul>
    </div>
</div>
