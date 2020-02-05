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
                </div><br />
            @endif
            <form method="post" action="{{ route('courriers.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="sender">Sender</label>
                    <input type="text" class="form-control" name="sender"/>
                </div>
                <div class="form-group">
                    <label for="receiver">Receiver</label>
                    <input type="text" class="form-control" name="receiver"/>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject"/>
                </div>
                <div class="form-group">
                    <label for="corps">Corps</label>
                    <input type="text" class="form-control" name="corps"/>
                </div>
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <input type="text" class="form-control" name="comments"/>
                </div>
                <div class="form-group">
                    <label for="object">Object</label>
                    <input type="text" class="form-control" name="object"/>
                </div>
                <div class="form-group">
                    <label for="treater">Traiter (treater 1, treater 2...)</label>
                    <input type="text" class="form-control" name="treater"/>
                </div>
                <div class="form-group">
                    <label for="urgency">Urgency</label>
                    <input type="number" max="3" min="1" placeholder="1" class="form-control" name="urgency"/>
                </div>
                <div class="form-group">
                    <label for="receptionDate">Reception date</label>
                    <input type="date" class="form-control" name="receptionDate"/>
                </div>
                <div class="form-group">
                    <input type="hidden" value="1" name="status"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create Courrier</button>
            </form>
        </div>
    </div>
@endsection
