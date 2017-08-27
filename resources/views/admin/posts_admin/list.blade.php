@extends('admin.dash')
@section('header1')
    ID
@endsection
@section('header2')
    Title
@endsection

@section('header3')
    Slug
@endsection

@section('header4')
 Test
@endsection

@section('body')
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td> {{ $post->title }}</td>
            <td>ipsum</td>
            <td>dolor</td>
            <td><a href ="/admin/posts/{{ $post->id }}/edit">edit</a></td>
        </tr>

    @endforeach

    </tbody>
@endsection