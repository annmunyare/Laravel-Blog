@extends('layout')

@section('content')
<form class = "form-horizontal" action="/categories/{{$category-> categoryId}}" method = "POST">   
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
  <div class="form-group">
    <label for="category_parent">Parent <Title></Title></label>
    <input type="number" class="form-control" name="category_parent" value ="{{$category->category_parent}}">
    
  </div>
  <div class="form-group">
    <label for="category_name">Category Name</label>
    <textarea  class="form-control" name="category_name"> {{$category->category_name}}</textarea>
  </div>
  <a href = "/categories " class="btn btn-sm btn-warning">Back</a></td>
  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>

@endsection
