@extends('layout')

@section('content')

    <div class="card push-top push-bottom text-center">
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
                    <label for="username" style="min-width: 300px">Username
                        <input type="text" class="form-control" style="max-width: 500px; text-align: center"
                               name="username" id="username"/></label>
                </div>
                <div class="form-group" style="margin-right: auto; margin-left: auto">
                    <label for="password" style="min-width: 300px">Password
                        <input type="password" class="form-control" style="max-width: 500px; text-align: center"
                               name="password" id="password"/></label>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection()
