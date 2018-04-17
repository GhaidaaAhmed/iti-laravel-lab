@extends('layouts.master')
@section('content')


<div class="container">
<h1>User info</h1>
<br/>
<div class="panel panel-default">
  <div class="panel-heading">
  Username:{{$user->name}}</div>
  <div class="panel-body">
  UserEmail:<span>{{$user->email}}</span>
  <br/>
  </div>
</div>



@endsection