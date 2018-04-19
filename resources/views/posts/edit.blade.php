
@extends('layouts.master')
@section('content')
<br>
<center>
    <a href='/posts' class="btn btn-primary btn-lg">Back</a>
</center>
    <br><br>
    <div class="row">
    <div class="form mt-5 col-8 offset-2">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/posts/{{$post->id}}" method="POST">

            {{ csrf_field() }}
            {{ method_field('PUT') }}
            
            <input type='hidden' name='id' value='{{ $post->id }}'>
                <div class="form-group">
                <input type="text" name="title" placeholder="Post title..." class="form-control" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <textarea name="desc" class="form-control" rows="6" placeholder="Description">{{ $post->desc }}</textarea>
                </div>
                <select class="form-control" name="user_id" title="Post Creator">
                        @foreach ($users as $user)
                    
                        <option class="form-control" value="{{$user->id}}"
                            @if($user->id == $post->user->id)
                                selected
                            @endif
                            >{{$user->name}}</option>
                    @endforeach
                    
                    </select>
            <br>
            <input type="submit" value="Submit" class="btn btn-primary">
            </form>
                </div>
            </div>
        </div>


@endsection