@extends('layouts.master')
@section('page_css')
<link href="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/clockface/css/clockface.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('breadcrumbs')
{!! Breadcrumbs::render('update_borrower_loan') !!}
@endsection
@section('page_header','តារាងអតិថិជនថ្មី')
@section('page_description','កែប្រែប្រាក់កម្ចី')
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

        <form action="{{route('borrower_loan.destroy',$borrower_loan[0]->id)}}" class="form-horizontal" method="POST" >
            {{ method_field('DELETE') }}
            {{csrf_field()}}
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">អតិថិជន</label>
                    <div class="col-md-4">
                        {{-- <input type="text" class="form-control input-circle" placeholder="បញ្ចូលឈ្មោះអតិថិជនថ្មី"> --}}
                        <select class="form-control"​ name="borrower_id" >
                                <option></option>
                            @foreach ($borrowers as $borrower)
                                <option value="{{$borrower->id}}" {{$borrower->id==$borrower_loan[0]->borrower_id?'selected':''}}>
                                    {{$borrower->name}}
                                </option>
                            @endforeach
                        </select>
                        @if($errors->has('borrower_id'))
                            <span id="name-error" class="help-block help-block-error"​ style="font-size: 12px;color:red">ត្រូវជ្រើសរើសអតិថិជន</span>
                        @endif 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">ប្រភេទកម្ចី</label>
                    <div class="col-md-4">
                        {{-- <input type="text" class="form-control input-circle" placeholder="បញ្ចូលឈ្មោះអតិថិជនថ្មី"> --}}
                        <select class="form-control"​ name="loan_id">
                            @foreach ($loans as $loan)
                                <option value="{{$loan->id}}" {{$loan->id==$borrower_loan[0]->loan_id?'selected':''}}>{{$loan->loan_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">ទំហំទឹកប្រាក់</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="number" min="100000" step="10000" class="form-control input-circle-left" placeholder="" name="amount" value="{{$borrower_loan[0]->amount}}">
                            <span class="input-group-addon input-circle-right">
                                <i >៛</i>
                            </span>
                        </div>
                        @if($errors->has('amount'))
                            <span id="name-error" class="help-block help-block-error"​ style="font-size: 12px;color:red">ត្រូវបញ្ចូលទំហំទឹកប្រាក់</span>
                        @endif 
                    </div>
                </div> 
                <div class="form-group last">
                    <label class="col-md-3 control-label">ថ្ងៃចាប់ផ្តើមបង់</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            {{-- <input type="text" readonly class="form-control input-circle-left date-picker" value="{{Carbon\Carbon::now()->format('d/m/Y')}}" name="start_pay_date"> --}}
                            <input type="text" readonly class="form-control input-circle-left date-picker" value="{{date('d/m/Y',strtotime($borrower_loan[0]->start_pay_date))}}" name="start_pay_date">
                            <span class="input-group-addon input-circle-right ">
                                <i class="fa fa-calendar"></i>
                            </span>
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
                        <a href="/borrower_loan" title="">
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
<script src="{{asset('assets/pages/scripts/components-select2.min.js')}}" type="text/javascript" charset="utf-8" async defer></script>
<script src="{{asset('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('assets/global/plugins/moment.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript" ></script>
<script src="{{asset('assets/global/plugins/clockface/js/clockface.js')}}" type="text/javascript" ></script>
<script>
    $('.date-picker').datepicker({
        format:"dd/mm/yyyy"
    });
</script>
@endsection
