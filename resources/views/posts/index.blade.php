@extends('layouts.master')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm">
<h1>
Posts
</h1>
<div ><a href={{ URL::to('posts/create' )}} ><input type="button" class="btn btn-success" value='Create Post'/></div></a>
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Slug</th>
      <th scope="col">Created At</th>
      <th scope="col" colspan='3'>Actions</th>
    </tr>
  </thead>
  <tbody>

@foreach($posts as $post)
<tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->User->name}}</td>
      <td>{{$post->slug}}</td>
      <td> {{ $post->created_at->format('Y-m-d') }} </td>
      <td><a href={{ URL::to('posts/' . $post->id) }} type="button" class="btn btn-primary">View</a></td>
      <td><a href={{ URL::to('posts/' . $post->id .'/edit') }} type="button" class="btn btn-warning" >Edit</a></td>
 <td> 
   <form action="{{URL::to('posts/' . $post->id ) }}" onsubmit="return confirm('Do you really want to delete?');" method="post" ><input name="_method" value="delete" type="submit" class="btn btn-danger" />
    {!! csrf_field() !!}
    {{method_field('Delete')}}</form></td>

</tr>
@endforeach
</tbody>
</table>
<?php echo $posts->render(); ?>
</div>
    <div class="col-sm">
    </div>
  </div>
</div>
@endsection