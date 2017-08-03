@extends('layouts.master')
@section('page_css')
<link href="{{asset('assets/pages/css/profile.min.css')}}" rel="stylesheet" type="text/css" />
<style>
.user-pic{
	display: inline-block;
    vertical-align: middle;
    height: 50px;
    width: 50px;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    -ms-border-radius: 100%;
    -o-border-radius: 100%;
    border-radius: 100%;
}
</style>
@endsection


@section('breadcrumbs')
{!! Breadcrumbs::render('borrower') !!}
@endsection

@section('page_header','បញ្ជីអតិថិជន')
@section('page_description','អតិថិជនចាស់ ថ្មី')
@section('content')
	<!-- BEGIN EXAMPLE TABLE PORTLET-->
	<div class="portlet light bordered">
		<div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="/borrower/new_borrower" title="">
                            	<button id="sample_editable_1_new" style="font-size: 14px" class="btn sbold green"> បន្ថែមអតិថិជនថ្មី
                                	<i class="fa fa-plus"></i>
                            	</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>			
		    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="borrowers_table">
		        <thead>
		            <tr>
						<th> រូបថត </th>
		                <th> ឈ្មោះ </th>
		                <th> ភេទ </th>
		                <th> អាសយដ្ឋាន </th>
		                <th> ទូរសព្ទ័ </th>
		                <th> ថ្ងែខេឆ្នាំបង្កើត </th>
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
			responsive:true,
            processing: true,
            serverSide: true,
            ajax: '{{url('/borrower/get_datatable')}}',
            columns: [
            	{
                        "render": function (data, type, JsonResultRow, meta) {
                        	var path = '{{asset('storage/')}}';
                            return '<img class="user-pic" src="'+path+'/'+JsonResultRow.photo+'">';
                        }
                },
	            { data: 'name' },
	            { data: 'sex',render:function(data){
	            	if(data=='m')
	            		return 'ប្រុស';
	            	else
	            		return 'ស្រី';
	            }},
	            { data: 'address' },
	            { data: 'phone' },
	          	{ data: 'created_at'}
	        ],"aaSorting": []
        });
	});
</script>					
@endsection