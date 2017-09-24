@extends('layouts.master')
@section('page_css')
@endsection
@section('breadcrumbs')
{!! Breadcrumbs::render('new_loan') !!}
@endsection
@section('page_header','តារាងកម្ចីថ្មី')
@section('page_description','បន្ថែមប្រភេទកម្ចីថ្មី')
@section('content')
    <div class="portlet box purple">
    <div class="portlet-title">
        {{-- <div class="caption"> --}}
            {{-- <i class="fa fa-gift"></i>Form Actions On Bottom </div> --}}
        {{-- <div class="tools">
            <a href="javascript:;" class="collapse"> </a>
            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
            <a href="javascript:;" class="reload"> </a>
            <a href="javascript:;" class="remove"> </a>
        </div> --}}
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form action="{{route('loan.store')}}" class="form-horizontal" method="POST">
            {{csrf_field()}}
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">ឈ្មោះកម្ចី</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-circle" placeholder="បញ្ចូលឈ្មោះកម្ចី" name="loan_name">
                        {{-- <span class="help-block"> A block of help text. </span> --}}
                        @if($errors->has('loan_name'))
                            <span id="name-error" class="help-block help-block-error"​ style="font-size: 12px;color:red">ត្រូវបញ្ចូលឈ្មោះកម្ចី</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">ការប្រាក់</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="number" step="0.1" class="form-control input-circle-left" placeholder="" name="interest">
                            <span class="input-group-addon input-circle-right">
                                <i class="fa fa-percent"></i>
                            </span>
                        </div>
                        @if($errors->has('interest'))
                            <span id="name-error" class="help-block help-block-error"​ style="font-size: 12px;color:red">ត្រូវបញ្ចូលការប្រាក់</span>
                        @endif                         
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">រយៈពេលបង់</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="number" min="1" class="form-control input-circle-left" placeholder="" name="term">
                            <span class="input-group-addon input-circle-right">
                                <i>ថ្ងៃ</i>
                            </span>
                        </div>
                        @if($errors->has('term'))
                            <span id="name-error" class="help-block help-block-error"​ style="font-size: 12px;color:red">ត្រូវបញ្ចូលរយៈពេលបង់</span>
                        @endif                        
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-md-3 control-label">ប្រភេទបង់</label>
                    <div class="col-md-4">
                        {{-- <input type="text" class="form-control input-circle" placeholder="បញ្ចូលឈ្មោះអតិថិជនថ្មី"> --}}
                        <select class="form-control"​ name="frequency">
                            <option value="1">រាល់ថ្ងៃ</option>
                            <option value="7">រៀងរាល់ ០៧ថ្ងៃ</option>
                            <option value="15">រៀងរាល់ ១៥ថ្ងៃ</option>
                            <option value="30">រៀងរាល់ ៣០ថ្ងៃ</option>
                        </select>
                        {{-- <span class="help-block"> A block of help text. </span> --}}
                    </div>
                </div>                    
                       
            

{{--                 <div class="form-group">
                    <label class="col-md-3 control-label">Email Address</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon input-circle-left">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <input type="email" class="form-control input-circle-right" placeholder="Email Address"> </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Password</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="password" class="form-control input-circle-left" placeholder="Password">
                            <span class="input-group-addon input-circle-right">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Left Icon</label>
                    <div class="col-md-4">
                        <div class="input-icon">
                            <i class="fa fa-bell-o"></i>
                            <input type="text" class="form-control input-circle" placeholder="Left icon"> </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Right Icon</label>
                    <div class="col-md-4">
                        <div class="input-icon right">
                            <i class="fa fa-microphone"></i>
                            <input type="text" class="form-control input-circle" placeholder="Right icon"> </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Input With Spinner</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control spinner input-circle" placeholder="Password"> </div>
                </div>
                <div class="form-group last">
                    <label class="col-md-3 control-label">Static Control</label>
                    <div class="col-md-4">
                        <span class="form-control-static"> email@example.com </span>
                    </div>
                </div> --}}
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-circle purple">ដាក់បញ្ចូល</button>
                        <a href="{{route('loan.index')}}" title="">
                            <button type="button" class="btn btn-circle grey-salsa btn-outline">បោះបង់</button>
                        </a>
                    </div>
                </div>
            </div>
        </form>
        <!-- END FORM-->
    </div>
    </div>
@endsection
@section('script')

@endsection
