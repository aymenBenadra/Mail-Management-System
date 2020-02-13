@extends('layout')

@section('content')

    <div class="card push-top text-center">
        <div class="card-header text-center">
            <div class="row text-center">
                <a href="{{ route('courriers_'.Auth()->user()->role.'.index') }}" class="card-link col-md-4">Return to
                    index</a>
                <p class="col-md-4">File upload</p>
                @if(Auth()->user()->role == 'admin' or Auth()->user()->role == 'bo')
                    <a href="{{ route('courriers_'.Auth()->user()->role.'.create') }}" class="card-link col-md-4">Create
                        new courrier</a>
                @endif
            </div>
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
            <form action="{{route('upload')}}" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    @csrf
                    <label for="ref">Courrier REF:
                        <input class="form-control" name="ref" type="text">
                    </label>
                </div>
                <div class="form-group">
                    <label for="attachments[]">Courriers attachments (can attach more than one): <br>
                        <input class="form-control" multiple="multiple" name="attachments[]" type="file">
                    </label>
                </div>
                <input type="submit" value="Upload" class="btn btn-block btn-primary">
            </form>
        </div>
    </div>
    @if(session()->has('message'))
        <p class="alert {{ session()->get('alert-class', 'alert-info') }}">{{ session()->get('message') }}</p>
    @endif
@endsection()
