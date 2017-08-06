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
{!! Breadcrumbs::render('borrower_loan') !!}
@endsection

@section('page_header','បញ្ជីកម្ចី')
@section('page_description','តារាងកម្ចីរបស់អតិថិជន')
@section('content')


	<!-- BEGIN EXAMPLE TABLE PORTLET-->
	<div class="portlet light bordered">
		<div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="/borrower/new_borrower" title="">
                            	<button id="sample_editable_1_new" style="font-size: 14px" class="btn sbold green"> បន្ថែមកម្ចីថ្មី
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
		                <th> ទំហំទឹកប្រាក់ </th>
		                <th> ប្រភេទកម្ចី </th>
		                <th> ថ្ងៃចាប់ផ្តើមបង់ </th>
		                <th> ថ្ងៃបង់ចុងក្រោយ </th>
		                <th> ចំនួនថ្ងៃបានបង់ </th>
		                <th> ចំនួនថ្ងៃនៅសល់ </th>
		                <th> បង្ហាញលំអិត </th>
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
			// responsive:true,
            processing: true,
            serverSide: true,
            ajax: '{{url('/borrower_loan/get_datatable')}}',
            columns: [
            	{
                        "render": function (data, type, JsonResultRow, meta) {
                        	var path = '{{asset('storage/')}}';
                            return '<img class="user-pic" src="'+path+'/'+JsonResultRow.photo+'">';
                        }
                },
	            { data: 'name' },
				{ data: 'amount' },
	            { data: 'loan_name' },
	            { data: 'start_pay_date' },
	          	{ data: 'finish_date' },
	          	{ data: 'paid_day' },
	          	{ data: 'remain_day' },
	          	{defaultContent: '<a href="www.google.com" title=""><button type="button" class="btn blue-hoki btn-md">បង្ហាញ</button></a>'},
	        ],"aaSorting": []
        });
	});
</script>					
@endsection