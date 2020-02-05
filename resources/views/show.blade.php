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
                    <label for="sender">Sender</label>
                    <input type="text" class="form-control" name="sender" value="{{ $courrier->sender }}" readonly/>
                </li>
                <li class="list-group-item">
                    <label for="receiver">Receiver</label>
                    <input type="text" class="form-control" name="receiver" value="{{ $courrier->receiver }}" readonly/>
                </li>
                <li class="list-group-item">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" value="{{ $courrier->subject }}" readonly/>
                </li>
                <li class="list-group-item">
                    <label for="corps">Corps</label>
                    <input type="text" class="form-control" name="corps" value="{{ $courrier->corps }}" readonly/>
                </li>
                <li class="list-group-item">
                    <label for="comments">Comments</label>
                    <input type="text" class="form-control" name="comments" value="{{ $courrier->comments }}" readonly/>
                </li>
                <li class="list-group-item">
                    <label for="object">Object</label>
                    <input type="text" class="form-control" name="object" value="{{ $courrier->object }}" readonly/>
                </li>
                <li class="list-group-item">
                    <label for="treater">Traiter (treater 1, treater 2...)</label>
                    <input type="text" class="form-control" name="treater" value="{{ $courrier->treater }}" readonly/>
                </li>
                <li class="list-group-item">
                    <label for="urgency">Urgency</label>
                    <input type="number" max="3" min="1" placeholder="1" class="form-control" name="urgency"
                           value="{{ $courrier->urgency }}" readonly/>
                </li>
                <li class="list-group-item">
                    <label for="receptionDate">Reception date</label>
                    <input type="date" class="form-control" name="receptionDate"
                           value="{{ $courrier->receptionDate }}" readonly/>
                </li>
            </ul>
            <div class="card-body">
                <a href="{{ route('courriers.index') }}" class="card-link">Return to index</a>
                <a href="{{ route('courriers.create') }}" class="card-link">Create new courrier</a>
            </div>
        </div>
    </div>
@endsection
