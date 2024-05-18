@extends('layouts.app') 

@section('content')

                 
<div class="container d-flex justify-content-center mt-3">
    <div class="w-50">
        <h2>会社情報</h2>

<table class="company">
 <tr>
  <td><b>会社名</b></td>
  <td>{{$company->name}}</td>
  </tr>
 <tr>
  <td><b>代表</b></td>
  <td>侍太郎</td>
 </tr>
 <tr>
  <td><b>設立日</b></td>
  <td>2024-06-02</td>
 </tr>
 <tr>
  <td><b>郵便番号</b></td>
  <td>〒1234567</td>
 </tr>
 <tr>
  <td><b>住所</b></td>
  <td>東京都侍区侍町1-2-3</td>
 </tr>
 <tr>
  <td><b>事業内容</b></td>
  <td>飲食店の検索・予約サービス</td>
 </tr>
</table>

</div>
</div>

@endsection

