@extends('layouts.master')
@section('page_css')
<link href="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('breadcrumbs')
{!! Breadcrumbs::render('new_borrower') !!}
@endsection
@section('page_header','តារាងអតិថិជនថ្មី')
@section('page_description','បង្កើតអតិថិជនថ្មី')
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
        <form action="/borrower" class="form-horizontal" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">ឈ្មោះ</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-circle" placeholder="បញ្ចូលឈ្មោះអតិថិជនថ្មី" name="name" required> 
                        {{-- <span class="help-block"> A block of help text. </span> --}}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">ភេទ</label>
                    <div class="col-md-4">
                        {{-- <input type="text" class="form-control input-circle" placeholder="បញ្ចូលឈ្មោះអតិថិជនថ្មី"> --}}
                        <select class="form-control"​ name="sex">
                            <option value="f">ស្រី</option>
                            <option value="m">ប្រុស</option>
                        </select>
                        {{-- <span class="help-block"> A block of help text. </span> --}}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">អាសយដ្ឋាន</label>
                    <div class="col-md-4">
                        <textarea name="address" placeholder="បញ្ចូលអសយដ្ឋានអតិថិជន"​ class="form-control "></textarea>
                        {{-- <span class="help-block"> A block of help text. </span> --}}
                    </div>
                </div>                                
                <div class="form-group">
                    <label class="col-md-3 control-label">លេខទូរស័ព្ទ</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-circle" placeholder="លេខទូរស័ព្ទអតិថិជន" name="phone" id="phone" >
                        {{-- <span class="help-block"> A block of help text. </span> --}}
                    </div>
                </div>       
                <div class="form-group last">
                    <label class="control-label col-md-3">រូបថត</label>
                    <div class="col-md-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                            <div>
                                <span class="btn default btn-file">
                                    <span class="fileinput-new"> ជ្រើសរើសរូបថត </span>
                                    <span class="fileinput-exists"> ប្តូររូបថត </span>
                                    <input type="file" name="photo"> </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> លុបរូបថត </a>
                            </div>
                        </div>
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
                        <a href="/borrower" title="">
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
<script src="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript" ></script>
<script src="{{asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js')}}" type="text/javascript" ></script>
<script src="{{ asset('assets/pages/scripts/form-input-mask.min.js') }}" type="text/javascript"></script>
<script>
        $(document).ready(function()
            {
                $('#phone').inputmask("999[9] 999 999");
            });
</script>

@endsection
