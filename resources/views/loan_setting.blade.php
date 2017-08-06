@extends('layouts.master')
@section('page_css')
<style>
th{
	text-align: center;
}
</style>
@endsection
@section('breadcrumbs')
{!! Breadcrumbs::render('setting_loan') !!}
@endsection

@section('page_header','បញ្ជីប្រភេទកម្ចី')
@section('page_description','កំណែរប្រែប្រភេទកម្ចី')
@section('content')
	<!-- BEGIN EXAMPLE TABLE PORTLET-->
	
	<div class="portlet light bordered">
		<div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="/setting/setting_loan/new_setting_loan" title="">
                            	<button id="sample_editable_1_new" style="font-size: 14px" class="btn sbold green"> បន្ថែមប្រភេទកម្ចី
                                	<i class="fa fa-plus"></i>
                            	</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>			
		    <table class="table table-striped table-bordered table-hover table-checkable order-column text-center" id="setting_loan_table">
		        <thead>
		            <tr>
		                <th> ល.រ </th>
		                <th> ឈ្មោះកម្ចី </th>
		                <th> ការប្រាក់(%) </th>
		                <th> រយៈពេលបង់ </th>
		                <th> ប្រភេទបង់ </th>
		            </tr>
		        </thead>

		        <tbody>
		        	@foreach($loans as $indexKey=>$loan)
						<tr>
							<td>{{$indexKey + 1}}</td>
							<td>{{$loan->loan_name}}</td>
							<td>{{$loan->interest.'%'}}</td>
							<td>{{$loan->term.'ថ្ងៃ'}}</td>
							<td>{{$loan->frequency.'ថ្ងៃ'}}</td>
						</tr>
					@endforeach
		        </tbody>
		    </table>
	        <div class="text-center">
	        	{{$loans->links()}}
	        </div>
		</div>
	</div>
	<!-- END EXAMPLE TABLE PORTLET-->
@endsection
