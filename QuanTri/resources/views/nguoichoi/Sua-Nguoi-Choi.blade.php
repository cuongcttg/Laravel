@extends('mainlayout')

@section('css')
<!-- Plugins css -->
<link href="{{ asset('assets/libs/jquery-nice-select/nice-select.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script src="{{ asset('assets/libs/jquery-nice-select/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/libs/switchery/switchery.min.js') }}"></script>
<script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
@endsection

@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Sửa người chơi</h4>
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                <form action="" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="tenDangNhap">Tên đăng nhập</label>
                        <input type="text" class="form-control" name="ten_dang_nhap" value="{{$nguoichoi->ten_dang_nhap}}" >
                        <label for="matKhau">Mật khẩu</label>
                        <input type="text" class="form-control" name="mat_khau" value="{{$nguoichoi->mat_khau}}" >
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="{{$nguoichoi->email}}"  >
                        <label for="hinhDaiDien">Hình đại diện</label>
                        <input type="text" class="form-control" name="hinh_dai_dien" value="{{$nguoichoi->hinh_dai_dien}}" >
                        <label for="diemCaoNhat">Điểm cao nhất</label>
                        <input type="text" class="form-control" name="mat_khau" readonly="true" value="{{$nguoichoi->diem_cao_nhat}}" >
                        <label for="credit">Credit</label>
                        <input type="text" class="form-control" name="credit" value="{{$nguoichoi->credit}}"  >
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Cập nhật</button>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col -->
</div>
@endsection