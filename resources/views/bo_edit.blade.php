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
            <form method="post" action="{{ route('courriers_bo.update', $courrier->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Sender
                        <input type="text" class="form-control" name="sender" value="{{ $courrier->sender }}"/>
                    </label>
                </div>
                <div class="form-group">
                    <label for="receiver">Receiver
                        <input type="text" class="form-control" name="receiver" value="{{ $courrier->receiver }}"/>
                    </label>
                </div>
                <div class="form-group">
                    <label for="subject">Subject
                        <input type="text" class="form-control" name="subject" value="{{ $courrier->subject }}"/>
                    </label>
                </div>
                <div class="form-group">
                    <label for="corps">Corps
                        <textarea rows="8" cols="50" class="form-control" placeholder="corps"
                                  name="corps">{{ $courrier->corps }}</textarea>
                    </label>
                </div>
                <div class="form-group">
                    <label for="comments">Comments
                        <textarea rows="8" cols="50" class="form-control" placeholder="comments"
                                  name="comments">{{ $courrier->comments }}</textarea>
                    </label>

                </div>
                <div class="form-group">
                    <label for="object">Object
                        <input type="text" class="form-control" name="object" value="{{ $courrier->object }}"/>
                    </label>
                </div>
                <div class="form-group">
                    <label for="treater">Traiter (treater 1, treater 2...)
                        <input type="text" class="form-control" name="treater" value="{{ $courrier->treater }}"/>
                    </label>
                </div>
                <div class="form-group">
                    <label for="urgency">Urgency
                        <input type="number" max="3" min="1" placeholder="1" class="form-control" name="urgency"
                               value="{{ $courrier->urgency }}"/>
                    </label>
                </div>
                <div class="form-group">
                    <label for="receptionDate">Reception date
                        <input type="date" class="form-control" name="receptionDate"
                               value="{{ $courrier->receptionDate }}"/>
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
