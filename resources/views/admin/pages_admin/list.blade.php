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
    @foreach($pages as $page)
        <tr>
            <td>{{ $page->id }}</td>
            <td> {{ $page->title }}</td>
            <td>ipsum</td>
            <td>dolor</td>
            <td><a href ="/admin/pages/{{ $page->id }}/edit">edit</a></td>
        </tr>

    @endforeach

    </tbody>
@endsection