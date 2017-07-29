@extends('layouts.master')
@section('page_css')
<link href="{{asset('assets/pages/css/profile.min.css')}}" rel="stylesheet" type="text/css" />
<style>
.user-pic{
	display: inline-block;
    vertical-align: middle;
    height: 30px;
    width: 30px;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    -ms-border-radius: 100%;
    -o-border-radius: 100%;
    border-radius: 100%;
}
</style>
@endsection
@section('content')
	<!-- BEGIN EXAMPLE TABLE PORTLET-->
	<div class="portlet light bordered">
		<div class="portlet-title">
		    <div class="caption font-dark">
		        <i class="icon-settings font-dark"></i>
		        <span class="caption-subject bold uppercase"> តារាងអតិថិជន</span>
		    </div>
		</div>

		<div class="portlet-body">
		    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="borrowers_table">
		        <thead>
		            <tr>
						<th> រូបថត </th>
		                <th> ឈ្មោះ </th>
		                <th> អាសយដ្ឋាន </th>
		                <th> ទូរសព្ទ័ </th>
		                <th> ថ្ងៃខេឆ្នាំបង្កើត </th>
		            </tr>
		        </thead>
		    </table>
		</div>
	</div>
	<!-- END EXAMPLE TABLE PORTLET-->
@endsection
@section('script')
<script>
	$(function() {
		$('#borrowers_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{url('/borrower/get_datatable')}}',
            columns: [
            	{
                        "render": function (data, type, JsonResultRow, meta) {
                            return '<img class="user-pic" src="'+JsonResultRow.photo+'">';
                        }
                },
	            { data: 'name' },
	            { data: 'address' },
	            { data: 'phone' },
	          	{ data: 'created_at'}
	        ],"aaSorting": []
        });
	});
</script>					
@endsection