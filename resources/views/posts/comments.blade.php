@extends('layout')
@section('content')
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#commentModal">
Add Comment
</button>
<!-- Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="/comments" method="POST" class="form-horizontal">
         {{@csrf_field()}}
         <input type="hidden" name="post_id" value ="{{$post->id}}">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add {{$post->title}} Comment</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label for="">Comment Description</label>
                  <textarea name="body" class="form-control" id=""></textarea>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="suubmit" class="btn btn-primary">Add Comment</button>
            </div>
         </div>
      </form>
   </div>
</div>
    @if(count($post->comments))
        <table class = "table table-condensed table stripped table-bordered table-hover">
        <th>#</th>
        <th> Created at</th>
        <th> Created By</th>
        <th> Body</th>
        <!-- <th >Body </th> -->
       <th colspan = "2"> Actions</th>
        @foreach($post->comments as $comment)
        <tr>
        <td>{{$comment->id}}</td>
            <!-- <td>{{$comment->title}}</td> -->
            <td>{{$comment->created_at->toFormattedDateString()}}</td>
            <td>{{$comment->user->name}}</td>
            <td>{{$comment->body}}</td>
            <td> 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$comment->id}}">Edit</button>
<!-- Modal -->
<div class="modal fade" id="editModal{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="/comments/{{$post->id}}/{{$comment->id}}" method="POST" class="form-horizontal">
         {{@csrf_field() }}
         {{method_field('PATCH')}}
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Edit{{$post->title}} Comment</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label for="">Comment Description</label>
                  <textarea name="body" class="form-control" id="">{{$comment->body}} </textarea>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="suubmit" class="btn btn-primary">Edit Comment</button>
            </div>
         </div>
      </form>
   </div>
</div>
            </td> 
            <td> <a href = "/posts/delete/{{$post->id}} " onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a></td> 
            <!-- <td> <a href = "/posts/comments/{{$post->id}} " class="btn btn-sm btn-success">Comment</a></td>  -->

        </tr>
        @endforeach
        </table>
    @endif
@endsection