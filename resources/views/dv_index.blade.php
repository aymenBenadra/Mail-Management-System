@extends('layout')

@section('content')
    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>
    <div class="push-top">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif
        <div id="toolbar">
            <select class="form-control">
                <option value="">Export Basic</option>
                <option value="all">Export All</option>
                <option value="selected">Export Selected</option>
            </select>
        </div>
        <table id="table"
               data-id-field="ref"
               data-unique-id="ref"
               data-escape="false"
               data-show-fullscreen="true"
               buttonsToolbar="true"
               data-show-pagination-switch="true"
               data-pagination="true"
               data-pagination-loop="true"
               show-button-icons="true"
               data-toggle="table"
               data-search="true"
               data-filter-control="true"
               data-show-export="true"
               data-click-to-select="false"
               data-toolbar="#toolbar"
               class="table-responsive">
            <thead class="thead-dark">
            <tr>
                <th data-field="state" data-checkbox="true">State</th>
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
                <th data-field="action" scope="col" class="text-center w-100">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 0; ?>
            @foreach($courrier as $courriers)
                <tr>
                    <td class="bs-checkbox">
                        <label>
                            <input data-index="{{$i++}}" name="btSelectItem" type="checkbox">
                        </label>
                    </td>
                    <td>{{$courriers->id}}</td>
                    <td>{{$courriers->sender}}</td>
                    <td>{{$courriers->receiver}}</td>
                    <td>{{$courriers->subject}}</td>
                    <td>{{$courriers->object}}</td>
                    <td>{{$courriers->treater}}</td>
                    <td>{{$courriers->urgency}}</td>
                    <td>{{$courriers->status}}</td>
                    <td>{{$courriers->receptionDate}}</td>
                    <td>
                        <a href="{{ route('courriers_dv.show', $courriers->id)}}"
                           class="btn btn-primary btn-sm">Show</a>
                        <a href="{{ route('courriers_dv.edit', $courriers->id)}}" class="btn btn-primary btn-sm">Traitment</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.getElementById('role').innerText = 'DV';
    </script>
@endsection
