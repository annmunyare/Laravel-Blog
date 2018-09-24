@extends('layout')

@section('content')
<form class = "form-horizontal" action="/categories" method = "POST">   
    {{ csrf_field() }}
  <div class="form-group">
    <select name="category_parent" class="form-control">
    <option value="">Category Parent</option>
    @foreach ($categories as $category)
    <option value="{{$category->id}}">{{$category->category_name}}</option>
    @endforeach
    </select>
 </div>
  <div class="form-group">
    <label for="category_name"> Category Name</label>
    <textarea  class="form-control" name="category_name" placeholder=" Enter Category Name"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>

@endsection


