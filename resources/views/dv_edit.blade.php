@extends('layout')

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
            Edit & Update
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
            <form method="post" action="{{ route('courriers_dv.update', $courrier->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="traitment">Traitment
                        <textarea rows="8" cols="50" class="form-control" placeholder="traitment"
                                  name="traitment">{{ $courrier->traitment }}</textarea>
                    </label>
                </div>
                <div class="form-group">
                    <input type="hidden" value="2" name="status"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Update Courrier</button>
            </form>
        </div>
    </div>
@endsection
