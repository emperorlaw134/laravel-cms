@extends('admin.layout')

@section('content')

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>@yield('header1')</th>
                <th>@yield('header2')</th>
                <th>@yield('header3')</th>
                <th>@yield('header4')</th>
                <th>@yield('header5')</th>
            </tr>
            </thead>
            @yield('body')
        </table>
    </div>

@endsection