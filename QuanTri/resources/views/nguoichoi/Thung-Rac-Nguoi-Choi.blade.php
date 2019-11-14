@extends('mainlayout')

@section('css')
<!-- third party css -->
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<!-- third party css end -->
<!-- Sweet Alert-->
<link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<!-- third party js -->
<script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
<!-- third party js ends -->
<!-- Datatables init -->
<script type="text/javascript" charset="utf-8" async defer>
$(document).ready(function() {
	$("#linhvuc-datatable").DataTable({
    language: {
        paginate: {
            previous: "<i class='mdi mdi-chevron-left'>",
            next: "<i class='mdi mdi-chevron-right'>"
        }
    },
    drawCallback: function() {
        $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
    	}
    });
});
</script>

<!-- Sweet Alerts js -->
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Sweet alert init js-->
<script src="{{ asset('assets/js/pages/sweet-alerts.init.js') }}"></script>

<script type="text/javascript" charset="utf-8" async defer>
	function thongbaoxoa($id) {
		Swal.fire({
  title: 'Bạn có chắc chắn?',
  text: "Bạn có chắc muốn xóa?",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Xóa',
  cancelButtonText: 'Hủy'
}).then((result) => {
  if (result.value) {
    Swal.fire(
      'Đã xóa!',
      'Lĩnh vực đã được xóa thành công',
      'success'
    )
    $url='/linh-vuc/xoa/'+$id;
    open($url,"_self")
  }
})
	}
</script>
@endsection
@section('main-content')
<div class="row">
	<div class="col-12">
	    <div class="card">
	        <div class="card-body">
	        	@if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
	            <h4 class="header-title">Danh sách các người chơi</h4>
	            	            <table id="cauhoi-datatable" class="table dt-responsive nowrap">
	                <thead>
	                    <tr>
	                        <th>ID</th>
	                        <th>Tên đăng nhập</th>
	                        <th>Mật khẩu</th>
	                        <th>Email</th>
	                        <th>Hình đại diện</th>
	                        <th>Điểm cao nhất</th>
	                        <th>Credit</th>
	                        <th></th>
	                    </tr>
	                </thead>
	                <tbody>	   
	                    @foreach($trash as $nc)          	
	                    <tr>
	                        <td>{{ $nc->id }}</td>
	                        <td>{{ $nc->ten_dang_nhap }}</td>
	                        <td>{{ $nc->mat_khau }}</td>
	                        <td>{{ $nc->email }}</td>
	                        <td>{{ $nc->hinh_dai_dien }}</td>
	                        <td>{{ $nc->diem_cao_nhat }}</td>
	                        <td>{{ $nc->credit }}</td>
	                        <td>
	                        	<a href="{{route('nguoi-choi.restore-nc',$nc->id)}}" type="button" class="btn btn-info waves-effect waves-light"><i class="mdi mdi-backup-restore"></i></a>
	                        	
	                        	<a onclick="thongbaoxoa({{ $nc->id }})" type="button" id="btn-xoa" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></a>
	                        </td>
	                    </tr>
	               	    @endforeach      
	                </tbody>
	            </table>

	        </div> <!-- end card body-->
	    </div> <!-- end card -->
	</div><!-- end col-->
</div>
@endsection