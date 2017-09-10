@extends('layouts.app')

@section('content')
   <table class="centered">
        <thead>
          <tr>
              <th>名稱</th>
              <th>日期</th>
              <th>開始</th>
              <th>結束</th>
          </tr>
        </thead>

        <tbody>
        @foreach ($reservations as $resv)
         <tr>
         <td class="name">{{$resv->patient->name}}</td> <td>{{$resv->date}}</td> <td>{{$resv->hour1}}</td> <td>{{$resv->hour2}}</td>
         </tr>
         @endforeach
        </tbody>
      </table>
   
@endsection


