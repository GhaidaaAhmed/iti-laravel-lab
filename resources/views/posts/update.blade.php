@extends('layouts.master')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm">
<form  method="post" action="/posts/{{$post->id}}">
{{method_field('PUT')}}
{{csrf_field()}}
<label>Title</label>
<input type="text" name="title" value={{$post->title}}>
<br>
<label >Description </label>
<textarea name="description">{{$post->description}}</textarea>
<br>
<br>
<label > Created By:</label>
<select class="form-control" name="user_id">
@foreach ($users as $user)
@if($user->id == $post->user->id) 
    <option value="{{$user->id}}" selected>{{$user->name}}</option>
    @else
        <option value="{{$user->id}}" >{{$user->name}}</option>
@endif
@endforeach
</select>
<br>
<input type="submit" value="Submit" class="btn btn-primary">
</form>
</div>
    <div class="col-sm">
    </div>
  </div>
</div>
@endsection