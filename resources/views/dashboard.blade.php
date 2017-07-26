@extends('layouts.master')



@section('content')
    <div class="portlet light bordered">
	    <div class="portlet-title">
	        <div class="caption">
	            <i class="icon-share font-dark hide"></i>
	            <span class="caption-subject font-dark bold uppercase">Quick Info</span>
	        </div>
	        <div class="actions">
	            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
	                <i class="icon-cloud-upload"></i>
	            </a>
	            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
	                <i class="icon-wrench"></i>
	            </a>
	            <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
	            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
	                <i class="icon-trash"></i>
	            </a>
	        </div>
	    </div>
	    <div class="portlet-body">
	        <p> 1. Add the LI element with "sidebar-mobile-offcanvas-toggler" class from this template to your sidebar menu's UL. </p>
	        <p> 2. Apply <code>page-sidebar-mobile-offcanvas</code> class to the body element. </p>
	        <p> 3. Remove <code>data-toggle="collapse"</code> and <code>data-target=".navbar-collapse"</code> attributes from mobile menu toggler link with <code>menu-toggler responsive-toggler</code> classes. </p>
	        <p> 4. Remove <code>navbar-collapse collapse</code> classes from DIV with <code>page-sidebar</code> class. </p>
	    </div>
	</div>
@endsection