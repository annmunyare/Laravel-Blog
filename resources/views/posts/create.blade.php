@extends('layout')

@section('content')
<form class = "form-horizontal" action="/posts" method = "POST">   
    {{ csrf_field() }}
    
    <div class="form-group">
    <label for="title">Category </label>
    <select name="category_id" id=""  class="form-control">
      <option value="">---Category---</option>
      @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->category_name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="title">Post <Title></Title></label>
    <input type="text" class="form-control" name="title"  placeholder="Enter Title">
    
  </div>
  <div class="form-group">
    <label for="body">Post Body</label>
    <textarea  class="form-control" name="body" placeholder=" Enter Post Body"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>

@endsection
