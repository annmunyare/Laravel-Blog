@extends('layout')
@section('content')
<div id="main" class="row">
   <div id="content" class="col-md-8">
      <a href = "/posts/create " class="btn btn-sm btn-success">Add</a></td>
      <table class = "table table-condensed table stripped table-bordered table-hover">
         <tr>
            <th>#</th>
            <th> Title</th>
            <th >Category</th>
            <th >Created at</th>
            <th >Created By</th>
          
            <th colspan = "3"> Actions</th>
         </tr>
         @foreach($posts as $post)
         <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->category->category_name }}</td>
            <td>{{$post->created_at->toFormattedDateString()}}</td>
            <td>{{$post->user->name}}</td>
           
            <td> <a href = "/posts/edit/{{$post->id}} " class="btn btn-sm btn-primary">Edit</a></td>
            <td> <a href = "/posts/delete/{{$post->id}} " onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a></td>
            <td> <a href = "/posts/comments/{{$post->id}} " class="btn btn-sm btn-success">Comment</a></td>
         </tr>
         @endforeach
      </table>
   </div>
   <div id="sidebar" class="col-md-4">

        @include('layouts.sidebar')

   </div>
</div>
@endsection


