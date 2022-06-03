@extends('layouts.admin')
@section('title',__('adminstaticwords.CreateUser'))
@section('content')
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text">
      @can('users.view')
      <a href="{{url('admin/users')}}" data-toggle="tooltip" data-original-title="{{__('adminstaticwords.GoBack')}}" class="btn-floating"><i class="material-icons">reply</i></a>
      @endcan
      {{__('adminstaticwords.CreateUser')}}</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="admin-form-block z-depth-1">          
          {!! Form::open(['method' => 'POST', 'action' => 'UsersController@store', 'files' => true]) !!}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              {!! Form::label('name', __('adminstaticwords.EnterName')) !!}
              {{-- <p class="inline info"> - Please enter your name</p> --}} 
              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('adminstaticwords.PleaseEnterYourName')}}"></i>
              {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'autofocus', 'placeholder' => __('adminstaticwords.PleaseEnterYourName') ]) !!}
              <small class="text-danger">{{ $errors->first('name') }}</small>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              {!! Form::label('email',__('adminstaticwords.EmailAddress')) !!}
              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('adminstaticwords.PleaseEnterYourEmail')}}"></i>
              {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('adminstaticwords.PleaseEnterYourEmail')]) !!}
              <small class="text-danger">{{ $errors->first('email') }}</small>
            </div>
            <div class="search form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              {!! Form::label('password', __('adminstaticwords.Password')) !!}
              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('adminstaticwords.PleaseEnterYourPassword')}}"></i>
              {!! Form::password('password', ['id' => 'password',' class' => 'form-control', 'required' => 'required', 'placeholder' => __('adminstaticwords.PleaseEnterYourPassword')]) !!}
               <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
              <small class="text-danger">{{ $errors->first('password') }}</small>
            </div>
            <div class="search form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
              {!! Form::label('confirm_password', __('adminstaticwords.ConfirmPassword')) !!}
              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('adminstaticwords.PleaseEnterYourPasswordAgain')}}"></i>
              {!! Form::password('confirm_password', ['id' => 'confirm_password','class' => 'form-control', 'required' => 'required', 'placeholder' =>__('adminstaticwords.PleaseEnterYourPasswordAgain')]) !!}
               <span toggle="#confirm_password" class="fa fa-fw fa-eye field-icon toggle-password2"></span>

              <small class="text-danger">{{ $errors->first('confirm_password') }}</small>
            </div>
            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
              {!! Form::label('role',__('Role')) !!}
              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('Please Select Your Role')}}"></i>
              <select class="select2" name="role" id="">
                @foreach($roles as $role)
                  <option vlaue="{{$role->name}}">{{ucfirst($role->name)}}</option>
                @endforeach
              </select>
              <small class="text-danger">{{ $errors->first('role') }}</small>
            </div>
            <div class="search form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
              {!! Form::label('dob', __('adminstaticwords.DateOfBirth')) !!}
              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('adminstaticwords.PleaseEnterDateOfBirthOfUser')}}"></i>
             <input type="date" name="dob"  />
            
              <small class="text-danger">{{ $errors->first('dob') }}</small>
            </div>
           
            <div class="btn-group pull-right">
              <button type="reset" class="btn btn-info">{{__('adminstaticwords.Reset')}}</button>
              <button type="submit" class="btn btn-success">{{__('adminstaticwords.Create')}}</button>
            </div>
            <div class="clear-both"></div>
          {!! Form::close() !!}
        </div>  
      </div>
    </div>
  </div>
@endsection
@section('custom-script')
<script>
  $(function(){
    $('form').on('submit', function(event){
      $('.loading-block').addClass('active');
    });
  });

  $(".toggle-password2").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
  });
  
</script>


@endsection