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
    $url='cau-hoi/xoa/'+$id;
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
	            <h4 class="header-title">Danh sách các câu hỏi</h4>
	  			@if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
	            <table id="cauhoi-datatable" class="table dt-responsive nowrap">
	                <thead>
	                    <tr>
	                        <th>ID</th>
	                        <th>Nội dung</th>
	                        <th>Lĩnh vực</th>
	                        <th>Phương án a</th>
	                        <th>Phương án b</th>
	                        <th>Phương án c</th>
	                        <th>Phương án d</th>
	                        <th>Đáp án</th>
	                        <th></th>
	                    </tr>
	                </thead>
	                <tbody>	   
	                    @foreach($trash as $ch)          	
	                    <tr>
	                        <td>{{ $ch->id }}</td>
	                        <td>{{ $ch->noi_dung }}</td>
	                        <td>{{ $ch->linhVuc->Ten_linh_vuc }}</td>
	                        <td>{{ $ch->phuong_an_a }}</td>
	                        <td>{{ $ch->phuong_an_b }}</td>
	                        <td>{{ $ch->phuong_an_c}}</td>
	                        <td>{{ $ch->phuong_an_d }}</td>
	                        <td>{{ $ch->dap_an }}</td>
	                        <td>
	                        	<a href="{{ route('cau-hoi.restore',$ch->id) }}" type="button" class="btn btn-info waves-effect waves-light"><i class="mdi mdi-backup-restore"></i></a>
	                        	
	                        	<a onclick="thongbaoxoa({{ $ch->id }})" type="button" id="btn-xoa" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></a>
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