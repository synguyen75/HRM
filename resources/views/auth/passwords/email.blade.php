@extends('layout.auth')
@section('content')
    <div class="card-body">

        <form class="form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <h1>Đặt lại mật khẩu</h1>
            @if (session('status'))
                <div class="errors" style=" color: green">{{ session('status') }}</div>
            @endif
            <div class="flex-column">
                <label>Email </label>
            </div>
            <div class="inputForm">
                <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                    <g id="Layer_3" data-name="Layer 3">
                        <path
                            d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z">
                        </path>
                    </g>
                </svg>
                <input type="text" id="email" class="input" value="{{ old('email') }}" name="email"
                    placeholder="Nhập email" required autocomplete="email" autofocus>
            </div>
            <button class="button-submit" type="submit">Gửi Mail</button>

        </form>

    </div>
@endsection
