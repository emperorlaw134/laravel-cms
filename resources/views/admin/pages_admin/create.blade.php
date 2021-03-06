@include('admin.layouts.tinymce')
@extends('admin.dash')

@section('content')
    <div class="col-sm-8 blog-main">

        <h1>Create a Page</h1>
        <hr>

        <form method="post" action="/admin/pages">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content"></textarea>
            </div>



            <div class="form-group">

                <button type="submit" class="btn btn-primary">Publish</button>
            </div>

            @include('layouts.errors')

        </form>




    </div>
@endsection