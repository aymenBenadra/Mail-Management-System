@extends('layout')

@section('content')

    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>

    <h1>Admin</h1>
    <div class="push-top">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table">
            <thead>
            <tr class="table-warning">
                <td>REF</td>
                <td>sender</td>
                <td>receiver</td>
                <td>subject</td>
                <td>corps</td>
                <td>comments</td>
                <td>object</td>
                <td>treater</td>
                <td>urgency</td>
                <td>status</td>
                <td>receptionDate</td>
                <td class="text-center" width="100px">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($courrier as $courriers)
                <tr>
                    <td>{{$courriers->id}}</td>
                    <td>{{$courriers->sender}}</td>
                    <td>{{$courriers->receiver}}</td>
                    <td>{{$courriers->subject}}</td>
                    <td>{{$courriers->corps}}</td>
                    <td>{{$courriers->comments}}</td>
                    <td>{{$courriers->object}}</td>
                    <td>{{$courriers->treater}}</td>
                    <td>{{$courriers->urgency}}</td>
                    <td>{{$courriers->status}}</td>
                    <td>{{$courriers->receptionDate}}</td>
                    <td>
                        <a href="{{ route('courriers_admin.show', $courriers->id)}}" class="btn btn-primary btn-sm">Show</a>
                        <a href="{{ route('courriers_admin.edit', $courriers->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('courriers_admin.destroy', $courriers->id)}}" method="post" style="display: inline-block" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
