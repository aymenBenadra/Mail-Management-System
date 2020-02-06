@extends('layout');

@section('content')
    <style>
        .container {
            max-width: 450px;
        }

        .push-top {
            margin-top: 50px;
        }
    </style>

    <div class="card push-top">
        <div class="card-header">
            Login
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="post" action="{{ route('loginCheck') }}">
                <div class="form-group">
                    @csrf
                    <label for="username">Username
                        <input type="text" class="form-control" name="username"/>
                    </label>
                </div>
                <div class="form-group">
                    <label for="password">Password
                        <input type="password" class="form-control" name="password"/>
                    </label>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Login</button>
            </form>
        </div>
    </div>
@endsection()
