@extends('layouts.app')
@push('styles')
<link href="{{ asset('css/doctor_login.css') }}" rel="stylesheet">
@endpush


@section('content')
<div class="flash-message">
      @if(Session::has('login_failed'))
      <p class="">{{ Session::get('login_failed') }} </p>
      @endif
</div> <!-- end .flash-message -->
<div class="container">
<div class="login-form-wrapper row">
<div class="login-form col m12">

  <div class="login-form-title section">
  登入
  </div>
  


     {!! Form::open(["url"=>"/doctor/login", "method"=>"post",'class' => 'col-12'] ) !!}
    {{ csrf_field() }}
  
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" name="ssn" type="text" class="validate" value="{{ old('ssn') }}" placeholder="帳號">
  
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">https</i>
           <input type="password" name="password" value=""  class="validate"  placeholder="密碼">
         
        </div>


    <div class="row">
        <p class="right-align submit-wrapper">
        <button class="btn waves-effect waves-light submit-btn" type="submit" name="action">確認
        </button>
        </p>
    </div>
   {!! Form::close() !!}
  </div>

</div>

</div>
@endsection

<!--#3399CC #67B8DE #91C9E8 #B4DCED #E8F8FF>
