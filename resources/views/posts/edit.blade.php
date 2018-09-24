@extends('layout')

@section('content')
<form class = "form-horizontal" action="/posts/{{$post-> id}}" method = "POST">   
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
  <div class="form-group">
    <label for="title">Post <Title></Title></label>
    <input type="text" class="form-control" name="title" value ="{{$post->title}}">
    
  </div>
  <div class="form-group">
    <label for="body">Post Body</label>
    <textarea  class="form-control" name="body"> {{$post->body}}</textarea>
  </div>
  <a href = "/posts " class="btn btn-sm btn-warning">Back</a></td>
  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>

@endsection
