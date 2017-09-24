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
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
	<!-- BEGIN EXAMPLE TABLE PORTLET-->
	<div class="portlet light bordered" ng-app="borrower_loan" >
		<div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="{{action('BorrowerLoanController@create')}}" title="">
                            	<button id="sample_editable_1_new" style="font-size: 14px" class="btn sbold purple"> បន្ថែមកម្ចីថ្មី
                                	<i class="fa fa-plus"></i>
                            	</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
			<div class="portlet box purple" ng-controller="borrowerLoanController">
                <div class="portlet-title">
                	<div class="form-group">
                        <label></label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-search"></i>
                            </span>
                            <input type="text"  class="form-control" ng-model="search" placeholder="ស្វែងរកអតិថិជន"> </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover text-center" >
                            <thead>
                                <tr>
                                    <th ng-click="sort('photo')"> រូបថត<span class="glyphicon sort-icon" ng-show=" sortKey=='photo'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span> </th>
                                    <th ng-click="sort('name')"> ឈ្មោះអតិថិជន<span class="glyphicon sort-icon" ng-show=" sortKey=='name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span> </th>
                                    <th ng-click="sort('amount')"> ទឹកប្រាក់ខ្ចី<span class="glyphicon sort-icon" ng-show=" sortKey=='amount'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span> </th>
                                    <th ng-click="sort('loan_name')"> ប្រភេទកម្ចី<span class="glyphicon sort-icon" ng-show=" sortKey=='loan_name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span> </th>
                                    <th ng-click="sort('pay_amount')"> ទឹកប្រាក់ត្រូវបង់<span class="glyphicon sort-icon" ng-show=" sortKey=='pay_amount'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span> </th>
                                    <th ng-click="sort('frequency')"> ប្រភេទបង់<span class="glyphicon sort-icon" ng-show=" sortKey=='frequency'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span> </th>
                                    <th ng-click="sort('start_pay_date')"> ថ្ងៃចាប់ផ្តើមបង់<span class="glyphicon sort-icon" ng-show=" sortKey=='start_pay_date'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span> </th>
                                    <th ng-click="sort('finish_date')"> ថ្ងៃបង់ចុងក្រោយ<span class="glyphicon sort-icon" ng-show=" sortKey=='finish_date'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span> </th>
                                    <th ng-click="sort('paid_day')"> ចំនួនដងបានបង់<span class="glyphicon sort-icon" ng-show=" sortKey=='paid_day'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span> </th>
                                    <th ng-click="sort('remain_day')"> ចំនួនបង់នៅសល់<span class="glyphicon sort-icon" ng-show=" sortKey=='remain_day'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span> </th>
                                    <td>ផ្សេងៗ</td>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr ng-repeat="b in borrowerLoans" > --}}
                                	<tr dir-paginate="bl in borrowerLoans|orderBy:sortKey:reverse|filter:search|itemsPerPage:10" ng-cloak>
	                                    <td> <img src="{{url('storage')}}/@{{bl.photo}}" class="user-pic" alt=""> </td>
	                                    <td> @{{bl.name}} </td>
	                                    <td> @{{bl.amount|currency:""}} </td>
	                                    <td> @{{bl.loan_name}} </td>
                                        <td> @{{bl.pay_amount=(bl.amount*(bl.interest/100)+bl.amount)/bl.term|currency:""}} </td>
	                                    <td> @{{payType(bl.frequency)}} </td>
	                                    <td> @{{khmerDate(bl.start_pay_date)}} </td>
	                                    <td> @{{bl.finish_date=khmerDate(getFinishDate(bl.start_pay_date,bl.term))}} </td>
	                                    <td> @{{bl.paid_day=getPaidDay(bl.start_pay_date)}} </td>
                                        <td> @{{bl.remain_day=getRemainingDay(bl.start_pay_date,bl.term,bl.frequency)}} </td>
                                        <td >
                                            {{-- modal --}}
                                                <div class="modal fade text-left" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                <h4 class="modal-title">លុបកម្ចី</h4>
                                                            </div>
                                                            <div class="modal-body"> តើអ្នកពិតជាចង់លុបកម្ចីនេះមែនទេ? </div>
                                                            <div class="modal-footer">
                                                                <form action="@{{'/borrower_loan/'+ bl.id+'/destroy_bl'}}" class="form-horizontal" method="POST" >
                                                                    {{ method_field('DELETE') }}
                                                                    {{csrf_field()}}
                                                                    <div class="form-actions">
                                                                        <div class="row">
                                                                            <div class="col-md-offset-3 col-md-9">
                                                                                <button type="button" class="btn btn-circle purple" data-dismiss="modal">ទេ</button>
                                                                                <button type="submit" class="btn btn-circle red">លុបចោល</button>
                                                                                {{-- <a href="/borrower_loan" title="">
                                                                                    <button type="button" class="btn btn-circle red btn-outline">បោះបង់</button>
                                                                                </a> --}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            {{-- end modal --}}
                                                <a href="/borrower_loan/@{{bl.id}}/edit" title="" class="btn btn-sm blue">កែប្រែ</a>
                                                <a href="/borrower_loan/@{{bl.id}}/edit_cut_up" title="" class="btn btn-sm purple">កាច់ឡើង</a>
                                                <a data-toggle="modal" href="#basic" title="" class="btn btn-sm red">លុបចោល</a>
                                        </td>
	                                </tr>
                                {{-- </tr> --}}
                            </tbody>
                        </table>
                    </div>
                    <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true"></dir-pagination-controls>
                </div>
            </div>
		</div>
	</div>
	<!-- END EXAMPLE TABLE PORTLET-->
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="{{asset('/assets/global/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('/assets/pages/scripts/ui-modals.min.js')}}"></script>
{{-- <script src="{{asset('/assets/pages/scripts/ui-bootstrap-tpls-2.5.0.min.js')}}" type="text/javascript" charset="utf-8" async defer></script> --}}
<script src="{{asset('/assets/pages/scripts/dirPagination.js')}}"></script>
<script>
	
	var app = angular.module("borrower_loan",['angularUtils.directives.dirPagination']);
	app.controller("borrowerLoanController", function($scope,$http) {
    	$http.get('{{url('/borrower_loan/get_datatable')}}')
    	.then(function (response) {
    		$scope.borrowerLoans=response.data;
    	});
    // sorting function
	$scope.sort = function(keyname){
        $scope.sortKey = keyname;   //set the sortKey to the param passed
        $scope.reverse = !$scope.reverse; //if true make it false and vice versa
    }
    $scope.khmerDate=function(dateString){
    	moment.locale('km');
		return moment(dateString).format('ថ្ងៃdddd ទីDD ខែMMMM(MM) ឆ្នាំYYYY');
    }
    $scope.payType=function(frequencyId){
    	switch(frequencyId){
    		case 1:
    			return 'រាល់ថ្ងៃ';
    			break;	
    		case 7:
    			return 'រាល់ ០៧ថ្ងៃ';
    			break;	
    		case 15:
    			return 'រាល់ ១៥ថ្ងៃ';
    			break;	
    		case 30:
    			return 'រាល់ ៣០ថ្ងៃ';
    			break;	    
    	}			    			    			
    }
    $scope.getFinishDate=function(start_pay_date,term){
    	return moment(start_pay_date).add(term,'days')-1;
    }
    $scope.getPaidDay=function(startPayDate){
        var today = moment().startOf('day');
        var pd= today.diff(startPayDate,'days')+1;
        return pd < 0 ?0:pd;
    }
    $scope.getRemainingDay=function(spd,term,freq){
        var numberOfPayTime = term/freq;
        console.log(term);
        return Math.ceil(numberOfPayTime - $scope.getPaidDay(spd));
    }  
   });
</script>					
@endsection