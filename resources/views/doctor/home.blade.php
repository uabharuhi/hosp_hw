@extends('layouts.app')
@push('styles')
<link href="{{ asset('css/doctor_home.css') }}" rel="stylesheet">
@endpush
@section('content')
<div id="home_content" class="center-align">
<div class="section">
<h1 style="margin-bottom:5px;">{{Auth::guard('doctor')->user()->ssn}}</h1>
<span class="small  grey-text">歡迎使用本系統</span>
</div>
<p   style="font-size:20px;">
您有<span class="count">{{$rn}}</span>個預約
</p>
</div>
@endsection
