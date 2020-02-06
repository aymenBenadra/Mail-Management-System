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
            Add Courrier
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
            <form method="post" action="{{ route('courriers_admin.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="sender">Sender
                        <input type="text" class="form-control" name="sender"/>
                    </label>
                </div>
                <div class="form-group">
                    <label for="receiver">Receiver
                        <input type="text" class="form-control" name="receiver"/>
                    </label>
                </div>
                <div class="form-group">
                    <label for="subject">Subject
                        <input type="text" class="form-control" name="subject"/>
                    </label>
                </div>
                <div class="form-group">
                    <label for="corps">Corps
                        <textarea rows="8" cols="50" class="form-control" placeholder="corps" name="corps"></textarea>
                    </label>
                </div>
                <div class="form-group">
                    <label for="comments">Comments
                        <textarea rows="8" cols="50" class="form-control" placeholder="comments"
                                  name="comments"></textarea>
                    </label>
                </div>
                <div class="form-group">
                    <label for="object">Object
                        <input type="text" class="form-control" name="object"/>
                    </label>
                </div>
                <div class="form-group">
                    <label for="treater">Traiter (treater 1, treater 2...)
                        <input type="text" class="form-control" name="treater"/>
                    </label>
                </div>
                <div class="form-group">
                    <label for="urgency">Urgency
                        <input type="number" max="3" min="1" placeholder="1" class="form-control"
                               name="urgency"/>
                    </label>
                </div>
                <div class="form-group">
                    <label for="receptionDate">Reception date
                        <input type="date" class="form-control" name="receptionDate"/>
                    </label>
                </div>
                <div class="form-group">
                    <input type="hidden" value="1" name="status"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create Courrier</button>
            </form>
        </div>
    </div>
@endsection
