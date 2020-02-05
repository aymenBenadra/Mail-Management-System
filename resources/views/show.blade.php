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
            Show Courrier
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

            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    @csrf
                    @method('PATCH')
                    <label for="sender">Sender
                        <input type="text" class="form-control" name="sender" value="{{ $courrier->sender }}" readonly/>
                    </label>
                </li>
                <li class="list-group-item">
                    <label for="receiver">Receiver
                        <input type="text" class="form-control" name="receiver" value="{{ $courrier->receiver }}"
                               readonly/>
                    </label>
                </li>
                <li class="list-group-item">
                    <label for="subject">Subject
                        <input type="text" class="form-control" name="subject" value="{{ $courrier->subject }}"
                               readonly/>
                    </label>
                </li>
                <li class="list-group-item">
                    <label for="corps">Corps
                        <textarea rows="8" cols="50" class="form-control" name="corps"
                                  readonly>{{ $courrier->corps }}</textarea>
                    </label>
                </li>
                <li class="list-group-item">
                    <label for="comments">Comments
                        <textarea rows="8" cols="50" class="form-control" name="comments"
                                  readonly>{{ $courrier->comments }}</textarea>
                    </label>
                </li>
                <li class="list-group-item">
                    <label for="object">Object
                        <input type="text" class="form-control" name="object" value="{{ $courrier->object }}" readonly/>
                    </label>
                </li>
                <li class="list-group-item">
                    <label for="treater">Traiter (treater 1, treater 2...)
                        <input type="text" class="form-control" name="treater" value="{{ $courrier->treater }}"
                               readonly/>
                    </label>
                </li>
                <li class="list-group-item">
                    <label for="urgency">Urgency
                        <input type="number" max="3" min="1" placeholder="1" class="form-control" name="urgency"
                               value="{{ $courrier->urgency }}" readonly/>
                    </label>
                </li>
                <li class="list-group-item">
                    <label for="receptionDate">Reception date
                        <input type="date" class="form-control" name="receptionDate"
                               value="{{ $courrier->receptionDate }}" readonly/>
                    </label>
                </li>
            </ul>
            <div class="card-body">
                <a href="{{ route('courriers.index') }}" class="card-link">Return to index</a>
                <a href="{{ route('courriers.create') }}" class="card-link">Create new courrier</a>
            </div>
        </div>
    </div>
@endsection
