@extends('layouts.app') 

@section('content')

                 
<div class="container d-flex justify-content-center mt-3">
    <div class="w-50">
        <h2>会社情報</h2>

<table class="company">
 <tr>
  <td><b>会社名</b></td>
  <td>{{$company[0]->name}}</td>
  </tr>
 <tr>
  <td><b>代表</b></td>
  <td>{{$company[0]->representative}}</td>
 </tr>
 <tr>
  <td><b>設立日</b></td>
  <td>{{$company[0]->Establishmentday}}</td>
 </tr>
 <tr>
  <td><b>郵便番号</b></td>
  <td>{{$company[0]->postcode}}</td>
 </tr>
 <tr>
  <td><b>住所</b></td>
  <td>{{$company[0]->address}}</td>
 </tr>
 <tr>
  <td><b>事業内容</b></td>
  <td>{{$company[0]->business}}</td>
 </tr>
</table>

</div>
</div>

@endsection

