@extends('layouts.master')
@section('page_css')
<style>
th{
	text-align: center;
}
</style>
@endsection
@section('breadcrumbs')
{!! Breadcrumbs::render('loan') !!}
@endsection
@section('page_header','បញ្ជីប្រភេទកម្ចី')
@section('page_description','កំណែរប្រែប្រភេទកម្ចី')
@section('content')
	<!-- BEGIN EXAMPLE TABLE PORTLET-->
	@if(Session::has('flash_message'))
	    <div class="alert alert-success">
	        {{ Session::get('flash_message') }}
	    </div>
	@endif

	<div class="portlet light bordered">
		<div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="{{route('loan.create')}}" title="">
                            	<button id="sample_editable_1_new" style="font-size: 14px" class="btn sbold purple"> បន្ថែមប្រភេទកម្ចី
                                	<i class="fa fa-plus"></i>
                            	</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>	
            <div class="portlet box purple">
            	<div class="portlet-title">
                	<div class="form-group">
                        {{-- <label></label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-search"></i>
                            </span>
                            <input type="text"  class="form-control" ng-model="search" placeholder="ស្វែងរកអតិថិជន"> 
                        </div> --}}
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">                
					    <table class="table table-striped table-bordered table-hover text-center" >
					        <thead>
					            <tr>
					                <th> ល.រ </th>
					                <th>​ ប្រភេទកម្ចី </th>
					                <th> ការប្រាក់(%) </th>
					                <th> រយៈពេលបង់ </th>
					                <th> ប្រភេទបង់ </th>
					                <th>ផ្សេងៗ</th>
					            </tr>
					        </thead>

					        <tbody>
					        	@foreach($loans as $indexKey=>$loan)
									<tr>
										<td>{{$indexKey + 1}}</td>
										<td>{{$loan->loan_name}}</td>
										<td>{{$loan->interest.'%'}}</td>
										<td>{{$loan->term.'ថ្ងៃ'}}</td>
										<td>
											@if ($loan->frequency==1)
												រាល់ថ្ងៃ
											@elseif($loan->frequency==7)
												រៀងរាល់ ០៧ថ្ងៃ
											@elseif($loan->frequency==15)
												រៀងរាល់​ ១៥ថ្ងៃ
											@else
												រៀងរាល់​ ៣០ថ្ងៃ
											@endif
										</td>
										<td>
                                            <form action="{{action('LoanController@destroy',$loan->id)}}" class="form-horizontal" method="POST" >
                                                {{ method_field('DELETE') }}
                                                {{csrf_field()}}
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <a href="{{action('LoanController@edit',$loan->id)}}"><button type="button" class="btn purple-plum">កែប្រែ</button></a>
                                                            <button type="submit" class="btn red">លុបចោល</button>
                                                            {{-- <a href="/borrower_loan" title="">
                                                                <button type="button" class="btn btn-circle red btn-outline">បោះបង់</button>
                                                            </a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
										</td>
									</tr>
								@endforeach
					        </tbody>
					    </table>
			    	</div>
			    </div>
			</div>
	        <div class="text-center">
	        	{{$loans->links()}}
	        </div>
		</div>
	</div>
	<!-- END EXAMPLE TABLE PORTLET-->
@endsection
