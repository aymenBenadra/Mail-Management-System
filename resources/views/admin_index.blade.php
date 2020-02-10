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
            </div><br/>
        @endif
        <!--<div id="toolbar">
            <label>Export type
                <select class="form-control">
                    <option value="">Basic</option>
                    <option value="all">All</option>
                </select>
            </label>
        </div>-->
        <table id="table"
               data-toggle="table"
               data-search="true"
               data-filter-control="true"
               data-show-export="false"
               data-click-to-select="false"
               data-toolbar="#toolbar"
               class="table-responsive">
            <thead class="thead-dark">
            <tr>
                <th data-field="ref" data-filter-control="input" data-sortable="true" scope="col">REF</th>
                <th data-field="sender" data-filter-control="input" scope="col">sender</th>
                <th data-field="receiver" data-filter-control="input" scope="col">receiver</th>
                <th data-field="subject" data-filter-control="input" scope="col">subject</th>
                <th data-field="object" data-filter-control="input" scope="col">object</th>
                <th data-field="traiter" data-filter-control="input" scope="col">treater</th>
                <th data-field="urgency" data-filter-control="select" data-sortable="true" scope="col">urgency</th>
                <th data-field="status" data-filter-control="select" data-sortable="true" scope="col">status</th>
                <th data-field="receptionDate" data-filter-control="input" data-sortable="true" scope="col">
                    receptionDate
                </th>
                <th data-field="traitment" data-filter-control="input" scope="col">traitment</th>
                <th data-field="action" scope="col" class="text-center w-100">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courrier as $courriers)
                <tr>
                    <td>{{$courriers->id}}</td>
                    <td>{{$courriers->sender}}</td>
                    <td>{{$courriers->receiver}}</td>
                    <td>{{$courriers->subject}}</td>
                    <td>{{$courriers->object}}</td>
                    <td>{{$courriers->treater}}</td>
                    <td>{{$courriers->urgency}}</td>
                    <td>{{$courriers->status}}</td>
                    <td>{{$courriers->receptionDate}}</td>
                    <td>{{$courriers->traitment}}</td>
                    <td class="text-center">
                        <a href="{{ route('courriers_admin.show', $courriers->id)}}"
                           class="btn btn-primary btn-sm">Show</a>
                        <a href="{{ route('courriers_admin.edit', $courriers->id)}}"
                           class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('courriers_admin.destroy', $courriers->id)}}" method="post"
                              style="display: inline-block" onsubmit="return confirm('Are you sure?');">
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
