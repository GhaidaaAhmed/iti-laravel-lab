@extends('layouts.master')
@section('content')




<div class="container">
<h1>Post info</h1>
<br/>
<div class="panel panel-default">
  <div class="panel-heading">{{$post->title}}</div>
  <div class="panel-body">{{$post->description}}</div>
</div>
<h1>Posted By</h1>  
<div class="panel panel-default">
  <div class="panel-heading">{{$post->User->name}}</div>
  <div class="panel-body">
  {{$post->User->email}}
      <br/>
      {{$post->User->date_format}} 
  </div>
</div>  

<div ><a href='{{ URL::to('posts/create') }} ' ><input type="button" class="btn btn-success" value='Create Post'/></a></div>
</div>


@endsection