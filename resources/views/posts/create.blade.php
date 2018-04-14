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

<form method="post" action="/posts">
{{csrf_field()}}
<div class="form-group">
<label>Title</label>
<input type="text" name="title" class="form-control">
<br>
<label >Description </label>
<textarea name="description" class="form-control"></textarea>
<br>
<br>
<label > Created By:</label>
<select class="form-control" name="user_id" class="form-control form-control-lg">
@foreach ($users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
@endforeach

</select>
<br>
<input type="submit" value="Submit" class="btn btn-primary">
</div>
</form>
</div>
    <div class="col-sm">
    </div>
  </div>
</div>
@endsection