@extends('layouts.master')
@section('content')
<br>
<center>
        <a href='posts/create' class="btn btn-primary btn-lg">Add</a>
    </center>
        <br>
        <div class="row">
            <div class="col-10 offset-1">
        <table class='table table-striped'>
            <thead>
            <tr>
    
                <th  > Title </th>
                <th  > Posted By </th>
                <th > Created At </th>
                <th > Actions </th>
    
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach ( $posts as $post )
                    <td> {{ $post->title }} </td>
                    <td> {{ $post->user->name }} </td>
                    <td> {{ $post->readable_date }} </td>
                    <td id="actions" >
                        <div class="row">
                            <div class="col-4">
                                    <a href='posts/{{ $post->id }}' class="btn btn-success">View</a>

                            </div>
                            <div class="col-4">
                                    <a href='posts/{{ $post->id }}/edit' class="btn btn-primary">edit</a>
                            </div>
                            <div class="col-4">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_{{ $post->id }}">
                                Delete
                            </button>
                            </div>
                    </td>
            </tr>

            <div class="modal fade" id="delete_{{ $post->id }}" tabindex="-1" role="dialog" 
                    aria-labelledby="delete_post_{{ $post->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="delete_post_{{ $post->id }}">Delete Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Do you want to Delete this post ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="/posts/{{$post->id}}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </div>
                        </div>
                    </div>
    
            @endforeach
            </tbody>
    
    
        </table>
        <div class=row >
            <div class="offset-4 col-4" >
                    {{ $posts->links() }}
            </div>
        </div>
            </div>
        </div>
       
    

@endsection
