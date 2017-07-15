<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <ul>
            @foreach($tasks as $task)
                <li>{{$task->title}}</li>
            @endforeach
        </ul>

        <!-- Fonts -->

    </head>
    <body>

    <h1>Welcome</h1>

    </body>
</html>
