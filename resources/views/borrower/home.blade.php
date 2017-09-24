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
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
	<!-- BEGIN EXAMPLE TABLE PORTLET-->
	<div class="portlet light bordered" ng-app="borrower" >
		<div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="{{action('BorrowerController@create')}}" title="">
                            	<button id="sample_editable_1_new" style="font-size: 14px" class="btn sbold purple"> បន្ថែមអតិថិជនថ្មី
                                	<i class="fa fa-plus"></i>
                            	</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
			<div class="portlet box purple" ng-controller="borrowerController">
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
                                    <th ng-click="sort('sex')"> ភេទ<span class="glyphicon sort-icon" ng-show=" sortKey=='sex'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span> </th>
                                    <th ng-click="sort('address')"> អាស័យដ្ឋាន<span class="glyphicon sort-icon" ng-show=" sortKey=='address'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span> </th>
                                    <th ng-click="sort('phone')"> លេខទូរស័ព្ទ<span class="glyphicon sort-icon" ng-show=" sortKey=='phone'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span> </th>
                                    <th ng-click="sort('created_at')"> ថ្ងៃ​ ខែ ឆ្នាំបង្កើត<span class="glyphicon sort-icon" ng-show=" sortKey=='created_at'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr dir-paginate="borrower in borrowers|orderBy:sortKey:reverse|filter:search|itemsPerPage:10" ng-cloak>
                                    <td> <img src="{{url('storage')}}/@{{borrower.photo}}" class="user-pic" alt=""> </td>
                                    <td> @{{borrower.name}} </td>
                                    <td> @{{borrower.sex=='f'?'ស្រី':'ប្រុស'}} </td>
                                    <td> @{{borrower.address}} </td>
                                    <td> @{{borrower.phone}} </td>
                                    <td> @{{khmerDate(borrower.created_at)}} </td>
                                </tr>
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
{{-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script> --}}
{{-- <script src="{{asset('/assets/pages/scripts/ui-bootstrap-tpls-2.5.0.min.js')}}" type="text/javascript" charset="utf-8" async defer></script> --}}
<script src="{{asset('/assets/pages/scripts/dirPagination.js')}}"></script>
<script>
	var app = angular.module("borrower",['angularUtils.directives.dirPagination']);
	app.controller("borrowerController", function($scope,$http) {
    	$http.get('{{url('/borrower/get_datatable')}}')
    	.then(function (response) {
    		$scope.borrowers=response.data;
    	});
    // sorting function
	$scope.sort = function(keyname){
        $scope.sortKey = keyname;   //set the sortKey to the param passed
        $scope.reverse = !$scope.reverse; //if true make it false and vice versa
    }
    $scope.khmerDate=function(dateString){
        moment.locale('km');
        return moment(dateString).format('ថ្ងៃdddd ទីDD ខែMMMM/MM ឆ្នាំYYYY');
    }  
   });
</script>					
@endsection