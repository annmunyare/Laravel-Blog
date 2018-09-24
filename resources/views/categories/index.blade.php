@extends('layout')
 
 @section('content')
    <a href="/categories/create" class="btn btn-warning">Add Category</a>
    <table class="table table-condensed table striped">
    <tr>
    <th>#</th>
    <th>Category Name</th>
    <th>Categoy Parent</th>
    <th>Created On</th>
    <th colspan = '4'>Actions</th>
    </tr>
    @foreach ($categories as $category)
    <tr>
    <td>{{$category->id}} </td>
    <td>{{$category->category_name}} </td>
    <td>
    @foreach ($categories as $parent)
        @if($parent->id == $category->category_parent)
        {{$parent->category_name}}
        @endif
    @endforeach
  
    </td>
    <td>{{$category->created_at->toFormattedDateString()}} </td>
    
    <td>
    <td>
    <a href="/categories/edit/{{$category->id}}" class="btn btn-sm btn-primary">Edit</a>
    </td>
    <td>
    <a href="/categories/delete/{{$category->id}}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
    </td>
    </tr>
 @endforeach
 </table>
  
 @endsection