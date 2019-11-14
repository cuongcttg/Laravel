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
                <h4 class="mb-3 header-title">Thêm lĩnh vực</h4>
                @if(count($errors) > 0) 
                    <div class="alert alert-danger">    
                        @foreach($errors->all() as $err)    
                            {{$err}}<br>    
                        @endforeach 
                    </div>  
                @endif
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                <form action="" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="noiDung">Nội dung</label>
                        <input type="text" class="form-control" name="noi_dung"  >
                        <label for="noiDung">Lĩnh vực</label>
                        <div class="dropdown bootstrap-select">
                            <select name="linh_vuc_id" class="selectpicker" data-style="btn-info" tabindex="-98">
                                @foreach($linhvuc as $ch)
                                <option value="{{ $ch->id }}">{{ $ch->Ten_linh_vuc }}</option>
                                @endforeach
                            </select>                                   
                        <label for="phuongAnA">Phương án A</label>
                        <input type="text" class="form-control" name="phuong_an_a"  >
                        <label for="phuongAnB">Phương án B</label>
                        <input type="text" class="form-control" name="phuong_an_b"  >
                        <label for="phuongAnC">Phương án C</label>
                        <input type="text" class="form-control" name="phuong_an_c"  >
                        <label for="phuongAnD">Phương án D</label>
                        <input type="text" class="form-control" name="phuong_an_d"  >
                        <label for="dapAn">Đáp án</label>
                        <input type="text" class="form-control" name="dap_an"  >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Thêm</button>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col -->
</div>
@endsection