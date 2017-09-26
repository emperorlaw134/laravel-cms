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
            <td>
                <form method="post" action="/pages/{{ $page->id }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>

            </td>
            <td><a href ="/admin/pages/{{ $page->id }}/edit">edit</a></td>
        </tr>

    @endforeach

    @if( $flash = session('message'))
        <div id="flash-message" class="alert alert-danger" role="alert">
            {{ $flash }}
        </div>
    @endif

    </tbody>
@endsection