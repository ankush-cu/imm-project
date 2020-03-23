@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
    {{-- <div id="breadcrumb"> <a href="/admin/dashboard" title="Go to Home" class="tip-bottom">
    <i class="icon-home"></i> Home</a> <a href="#" class="current">Settings</a> 
    </div> --}}
    <h1>Edit License Type</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
    @if(Session::has('flash_message_error'))
                <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	            	
                <strong>{{ session('flash_message_error') }}</strong>
                </div>
            @endif 

            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	            	
                <strong>{{ session('flash_message_success') }}</strong>
                </div>
            @endif
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Update License Name</h5>
            </div>
            <div class="widget-content nopadding">
             <form class="form-horizontal" method="post" action="{{action('LicenseController@update' , $license->lic_id)}}" name="add_license" id="add_license" novalidate="novalidate">
              @method('PUT')
              @csrf
              <div class="control-group">
                <label class="control-label">License Name</label>
                <div class="controls">
                  <input type="text" name="license_name" id="license_name" value="{{$license->lic_name}}">
                </div>
              </div>        
                <div class="form-actions">
                <input type="submit" value="Update" class="btn btn-success">
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
</div>

@endsection
