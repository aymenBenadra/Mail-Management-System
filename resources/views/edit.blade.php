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
                </div><br />
            @endif
            <form method="post" action="{{ route('courriers.update', $courrier->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Sender</label>
                    <input type="text" class="form-control" name="sender" value="{{ $courrier->sender }}"/>
                </div>
                <div class="form-group">
                    <label for="receiver">Receiver</label>
                    <input type="text" class="form-control" name="receiver" value="{{ $courrier->receiver }}"/>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" value="{{ $courrier->subject }}"/>
                </div>
                <div class="form-group">
                    <label for="corps">Corps</label>
                    <input type="text" class="form-control" name="corps" value="{{ $courrier->corps }}"/>
                </div>
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <input type="text" class="form-control" name="comments" value="{{ $courrier->comments }}"/>
                </div>
                <div class="form-group">
                    <label for="object">Object</label>
                    <input type="text" class="form-control" name="object" value="{{ $courrier->object }}"/>
                </div>
                <div class="form-group">
                    <label for="treater">Traiter (treater 1, treater 2...)</label>
                    <input type="text" class="form-control" name="treater" value="{{ $courrier->treater }}"/>
                </div>
                <div class="form-group">
                    <label for="urgency">Urgency</label>
                    <input type="number" max="3" min="1" placeholder="1" class="form-control" name="urgency" value="{{ $courrier->urgency }}"/>
                </div>
                <div class="form-group">
                    <label for="receptionDate">Reception date</label>
                    <input type="date" class="form-control" name="receptionDate" value="{{ $courrier->receptionDate }}"/>
                </div>
                <div class="form-group">
                    <input type="hidden" value="2" name="status"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Update User</button>
            </form>
        </div>
    </div>
@endsection
