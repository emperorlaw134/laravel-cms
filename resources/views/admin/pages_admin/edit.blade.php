
@include('admin.layouts.tinymce')
@extends('admin.dash')



@section('content')
    <div class="col-sm-8 blog-main">

        <h1>Edit a Post</h1>
        <hr>

        <form method="post" action="/admin/pages/{{$page->id}}">



            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $page->title) }}" required >
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content"  required>{{ $page->content }}</textarea>
            </div>



            <div class="form-group">

                <button type="submit" class="btn btn-primary">Update</button>
            </div>

            @include('layouts.errors')

        </form>

        <form method="post" action="/pages/{{ $page->id }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="form-group">
                <button class="btn btn-danger">Delete</button>
            </div>

        </form>

        @if ($flash = session('message'))

            <p>this is a test</p>

            <div id="flash-message" class="alert alert-success" role="alert">
                {{ $flash }}
            </div>

            <script>


                window.setTimeout(function() {
                    $("#flash-message").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove();
                    });
                }, 3000);

                console.log("#flash-message");
            </script>

        @endif




    </div>

@endsection