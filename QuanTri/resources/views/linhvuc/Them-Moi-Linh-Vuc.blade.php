@extends('mainlayout')

@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Thêm lĩnh vực</h4>
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <form action="" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="tenLinhVuc">Tên lĩnh vực</label>
                        <input type="text" class="form-control" name="Ten_linh_vuc"  >
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Thêm</button>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col -->
</div>
@endsection