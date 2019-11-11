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
	$("#cauhoi-datatable").DataTable({
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
      'Câu hỏi đã được xóa thành công',
      'success'
    )
    $url='goi-credit/xoa/'+$id;
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
	            <h4 class="header-title">Danh sách các gói credit</h4>
	            <a href="{{	route('goi-credit.them-moi-gc') }}" style="margin-bottom: 10px;" type="button" class="btn btn-primary waves-effect waves-light">Thêm mới gói credit</a>
	  
	            <table id="cauhoi-datatable" class="table dt-responsive nowrap">
	                <thead>
	                    <tr>
	                        <th>ID</th>
	                        <th>Người Chơi</th>
	                        <th>Goi Credit </th>
	                        <th>Credit</th>
	                        <th>Số tiền</th>
	                    </tr>
	                </thead>
	                <tbody>	   
	                    @foreach($nguoichoi as $gc)          	
	                    <tr>
	                        <td>{{ $gc->id }}</td>
	                        <td>{{ $gc->ten_dang_nhap }}</td>
	                        <td>{{ $gc->ten_goi }}</td>
	                        <td>{{ $gc->credit }}</td>
	                        <td>{{ $gc->so_tien }}</td>
	                        <td>
	                        	<a href="{{ route('goi-credit.sua-gc',$gc->id) }}" type="button" class="btn btn-info waves-effect waves-light"><i class="mdi mdi-pencil-remove-outline"></i></a>
	                        	
	                        	<a onclick="thongbaoxoa({{ $gc->id }})" type="button" id="btn-xoa" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></a>
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