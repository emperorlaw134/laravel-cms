@extends('admin.dash')

@section('content')
<div class="col-sm-8 blog-main">

    <h1>Create a Post</h1>
    <hr>

    <form action="/admin/posts/{{$post->id}}">



        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required >
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content"  required>{{ $post->content }}</textarea>
        </div>



        <div class="form-group">

            <button type="submit" class="btn btn-primary">Update</button>
        </div>

        @include('layouts.errors')

    </form>




</div>

@endsection