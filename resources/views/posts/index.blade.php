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
      <td><button  value="{{$post->id }}" data-toggle="modal" data-target="#mymodal" class="btn btn-primary viewPost">View</button></td>
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Post Info</h5>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">
  <div class="panel-heading"id="post_title"></div>
  <div class="panel-body" id="post_desc"></div>
</div>
<h1>Posted By</h1>  
<div class="panel panel-default">
  <div class="panel-heading"><span id="user_name"></span></div>
  <div class="panel-body">
  <span id="user_mail"></span>
      <br/>
      <span id="user_date"></span>
  </div>
</div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      <td><a href={{ URL::to('posts/' . $post->id .'/edit') }} type="button" class="btn btn-warning" >Edit</a></td>
 <td> 
   <form action="{{URL::to('posts/' . $post->id ) }}" onsubmit="return confirm('Do you really want to delete?');" method="post" ><input name="_method" value="delete" type="submit" class="btn btn-danger" />
    {!! csrf_field() !!}
    {{method_field('Delete')}}</form></td>

</tr>
@endforeach
</tbody>
</table>
<td><a href={{ URL::to('posts/restore') }} type="button" class="btn btn-warning" >Restore deleted POst</a></td>
<?php echo $posts->render(); ?>
</div>
    <div class="col-sm">
    </div>
  </div>
</div>
@endsection