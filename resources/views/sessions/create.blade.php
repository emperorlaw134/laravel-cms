@extends ('layout')

@section ('content')

    <div class="col-md-8">

        <h1>Sign In</h1>

        <form method="post" action="/login">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" required>

            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>

            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" required>

            </div>

            <div class="form-group">

                <button class="btn btn-primary" type="submit">login</button>

            </div>

            @include ('layouts.errors')

        </form>


    </div>

@endsection