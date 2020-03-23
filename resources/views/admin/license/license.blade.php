
@extends('layouts.adminLayout.admin_design')
@section('content')
<!--main-container-part-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="/admin/dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/admin/license" class="current">License</a> </div>
    <h1>View License Type</h1>
  </div>
  <div class="container-fluid">
    <hr>
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
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>License Type</h5>
          </div>
          <div class="widget-content nopadding">
          @if(count($licenses)>0)
            <table class="table table-bordered data-table" >
              <thead>
                <tr>
                  <th>S.no</th>
                  <th>License Name</th>          
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($licenses as $key=>$license)
                <tr class="gradeX">
                  <td style="text-align:center">{{++$key}}</td>
                  <td style="text-align:center">{{$license->lic_name}}</td>                 
                  <td style="text-align:center"> 
                  <div class="fn"><a href="/admin/license/{{$license->lic_id}}/edit" class="btn btn-primary btn-mini">Edit</a>
                  <form class="fr" method="post" action="{{action('LicenseController@destroy' , $license->lic_id)}}" name="add_license" id="add_license" novalidate="novalidate">
                    @method('delete')
                    @csrf

                    @if($license->status=="0")
                  <button type="submit" class="btn btn-danger btn-mini" onclick="return confirm('Do You Want to Enable this ?')">Disable</a>
                    @else
                  <button type="submit" class="btn btn-success btn-mini" onclick="return confirm('Do You Want to Disable this ?')">Enable</a>                   
                    @endif
                  </form>
                  </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
              </table>
              @else
              <p> No Record Found </p>
              @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->
@endsection